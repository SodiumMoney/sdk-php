# Sodium Address SDK (PHP)

Derive deterministic Solana **payment addresses** from a social platform and username.

Send crypto to `@blknoiz06` on Twitter without asking for a wallet — look up the on-chain address from the handle.

> **Network note:** Program IDs differ between devnet and mainnet. Always pass the network your app targets. When Sodium launches on mainnet, update the `mainnet` program id in this SDK (see [Updating for mainnet](#updating-for-mainnet)).

## Supported platforms

- `twitter`
- `telegram`

## Quick start

See language-specific install instructions below.

## API overview

| Function | Description |
|----------|-------------|
| `normalizeUsername` | Strip `@`, trim, lowercase |
| `getPaymentAddress` | Address that holds inbound transfers for a handle |
| `getIdentityAddress` | On-chain identity record for a linked handle |
| `getConfigAddress` | Protocol configuration account |
| `getUsedProofAddress` | Replay-protection PDA for a proof hash |
| `getLinkRequestAddress` | Twitter link-request PDA |
| `getTelegramLinkRequestAddress` | Telegram link-request PDA |
| `getEvmSalt` | Future EVM CREATE2 salt helper |

## Test handles

These vectors are checked in CI:

| Username | Normalized | Payment address (mainnet) |
|----------|------------|--------------------------|
| @blknoiz06 | `blknoiz06` | `HPT9k5YWkKNQcZGewGmABjRu8A5Bnem6VsBmNrNsSgyd` |
| Ansem 🐂🀄️ | `ansem 🐂🀄️` | `k7JEBhVHHWLrNdhJ87cPbpgJr98kDVQuqUb5HsVKW7S` |
| @BLKNOIZ06 | `blknoiz06` | `HPT9k5YWkKNQcZGewGmABjRu8A5Bnem6VsBmNrNsSgyd` |
## Install

```bash
composer require sodiummoney/sdk-php
```

## Usage

```php
use Sodium\Sdk\Addresses;

$address = Addresses::getPaymentAddress('twitter', '@blknoiz06');
echo $address;
```

## Updating for mainnet

Devnet program id: `4qduM91VaZj9W9hRypygozjN7ZCeLPPe5veM2RhB7qgD`

Mainnet program id: `FQr13NtzFwLp8ZZwR8SWfjEGC4F4MBrJDrcSZuEsv3Gx`

Default network: `mainnet`

To change the mainnet program id after a redeploy, update `networks` config and re-run tests — payment addresses depend on program id.

## License

MIT — see [LICENSE](LICENSE).
