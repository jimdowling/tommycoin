<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class BuyController extends Controller
{
    public function index()
    {
        return view('buy');
    }

    /**
     * Validate the application form and create a Stripe Checkout Session.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'email'       => 'required|email|max:150',
            'wallet'      => 'required|string|max:200',
            'amount_usd'  => 'required|numeric|min:10|max:100000',
            'how_serious' => 'required|in:very,extremely,moon-or-bust,just-for-laughs',
            'agree_nfa'   => 'required|accepted',
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));

        $amountCents  = (int) round($validated['amount_usd'] * 100);
        $tommyTokens  = number_format((int) round($validated['amount_usd'] / 0.0042));

        $session = StripeSession::create([
            'mode'                => 'payment',
            'customer_email'      => $validated['email'],
            'success_url'         => route('buy.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'          => route('buy.cancel'),
            'line_items'          => [[
                'quantity'    => 1,
                'price_data'  => [
                    'currency'     => 'usd',
                    'unit_amount'  => $amountCents,
                    'product_data' => [
                        'name'        => 'TommyCoin Tokens',
                        'description' => "{$tommyTokens} TOMMY tokens — to the moon 🚀",
                        'images'      => [],
                    ],
                ],
            ]],
            'metadata' => [
                'buyer_name'   => $validated['name'],
                'wallet'       => $validated['wallet'],
                'tommy_tokens' => $tommyTokens,
                'how_serious'  => $validated['how_serious'],
            ],
            'payment_intent_data' => [
                'description' => "TommyCoin purchase: {$tommyTokens} TOMMY",
                'metadata'    => [
                    'wallet'       => $validated['wallet'],
                    'tommy_tokens' => $tommyTokens,
                ],
            ],
        ]);

        return redirect($session->url);
    }

    /**
     * Stripe redirects here after a successful payment.
     */
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');

        if (!$sessionId) {
            return redirect()->route('home');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = StripeSession::retrieve($sessionId);
        } catch (\Exception $e) {
            return redirect()->route('home');
        }

        if ($session->payment_status !== 'paid') {
            return redirect()->route('buy.cancel');
        }

        $meta = $session->metadata;

        return view('buy-success', [
            'name'         => $meta->buyer_name ?? 'Believer',
            'tommy_amount' => $meta->tommy_tokens ?? '???',
            'email'        => $session->customer_email,
            'amount_paid'  => number_format($session->amount_total / 100, 2),
        ]);
    }

    /**
     * Stripe redirects here if the user cancels on the Stripe checkout page.
     */
    public function cancel()
    {
        return view('buy-cancel');
    }

    /**
     * Stripe webhook — handles fulfillment after checkout.session.completed.
     * Must be excluded from CSRF middleware (see bootstrap/app.php).
     */
    public function webhook(Request $request)
    {
        $payload   = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret    = config('services.stripe.webhook');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $secret);
        } catch (SignatureVerificationException $e) {
            return response('Invalid signature', 400);
        } catch (\UnexpectedValueException $e) {
            return response('Invalid payload', 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $this->fulfil($session);
        }

        return response('OK', 200);
    }

    /**
     * Fulfil a completed order.
     * In production: update DB, send tokens, email confirmation, etc.
     */
    private function fulfil($session): void
    {
        $meta   = $session->metadata;
        $wallet = $meta->wallet ?? 'unknown';
        $tokens = $meta->tommy_tokens ?? '0';
        $email  = $session->customer_email;

        // TODO: store order in DB, trigger token dispatch to $wallet, send email to $email
        // For now just log it
        \Illuminate\Support\Facades\Log::info('TommyCoin order fulfilled', [
            'email'        => $email,
            'wallet'       => $wallet,
            'tommy_tokens' => $tokens,
            'session_id'   => $session->id,
            'amount'       => $session->amount_total,
        ]);
    }
}
