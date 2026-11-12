# Speedy Connect — company website

The public website for Speedy Connect: one network-management product sold in five editions
(ISPs, Hotels, Cafés & restaurants, Schools, Venues). It is published as plain HTML on
**GitHub Pages** at your own domain. The billing app is a separate, private repository.

## How it works

- `pages/*.php` are the six pages. They use PHP only as templates: the shared top bar, Editions
  menu, edition strip and footer come from `src/site.php`, so they are written once.
- `build.php` turns them into plain HTML in `_site/`. **GitHub Actions**
  (`.github/workflows/pages.yml`):
  - **Pull request into `main`:** runs the tests and the build, and publishes nothing.
  - **Anything that lands on `main`** (a merged pull request or a direct push): tests, builds and
    publishes to Pages. A broken build never replaces the live site.
- **Book a demo** checks the visitor's details, then opens WhatsApp to your business number with
  the request already typed out (edition, name, business, phone, size). The visitor presses Send.
  No server, no database, and no third party sees the details before your WhatsApp does.

## Settings: `site.config.php`

| Setting | What it is |
|---|---|
| `whatsapp` | Your business WhatsApp number, international form, digits only, e.g. `254712345678`. **Publishing refuses to run while this is empty.** |
| `domain` | Your domain once bought, e.g. `speedyconnect.co.ke`. Writes the `CNAME` file GitHub Pages needs. |

Both values appear on the public site, so neither is secret.

## Put it on your domain (HostPinnacle + GitHub Pages)

1. **GitHub:** in the repository, open *Settings → Pages* and set *Source* to **GitHub Actions**.
2. **Buy the domain** at HostPinnacle (domain only, no hosting needed).
3. **DNS at HostPinnacle** (client area → your domain → DNS management). Add:

   | Type | Name | Value |
   |---|---|---|
   | A | `@` | `185.199.108.153` |
   | A | `@` | `185.199.109.153` |
   | A | `@` | `185.199.110.153` |
   | A | `@` | `185.199.111.153` |
   | AAAA | `@` | `2606:50c0:8000::153` |
   | AAAA | `@` | `2606:50c0:8001::153` |
   | AAAA | `@` | `2606:50c0:8002::153` |
   | AAAA | `@` | `2606:50c0:8003::153` |
   | CNAME | `www` | `<your-github-username>.github.io` |

   Remove any other A/AAAA records on `@` (for example a parking page).
4. **Tell the site its domain:** set `domain` in `site.config.php`, then commit and push.
5. **GitHub:** *Settings → Pages → Custom domain* shows your domain once DNS has spread (minutes to
   a few hours). Then tick **Enforce HTTPS**.
6. Recommended: verify the domain under your GitHub account's *Settings → Pages → Verified
   domains*, so nobody else's Pages site can claim it.

## Work on it locally

```sh
php build.php                      # builds _site/
php -S localhost:8080 -t _site     # open http://localhost:8080/
php tests/run.php                  # checks every page, link and form
```

Needs PHP 8.1+ (only for building; the published site is plain HTML).

## Rules for the copy

- Only claim what the product does today. Every "With Speedy Connect" claim was checked against
  the billing app's `docs/BUSINESS-TYPES.md`, `docs/FEATURES.md` and `docs/MARKETING-FEATURES.md`.
- No invented proof: no customer counts, logos, testimonials or result percentages. Names and
  numbers appear only inside screens labelled as examples.
- No technical words in headlines (no WireGuard, RADIUS or CoA), and "books that balance", not
  "reconciliation".

## Still to do

- Pricing, Stories, About and the help centre are placeholder links.
