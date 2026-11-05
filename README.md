# Sofía Fernández Moreno — Portfolio

Static portfolio for GitHub Pages. Edit `index.html` for content,
`assets/css/portfolio.css` for styling and `assets/js/portfolio.js` for the footer year. The custom SF monogram and favicon
are in `assets/img/sf-mark.svg`.
No build step or package installation is needed.

For a local preview, run `python3 -m http.server 4173` from the repository root
and open http://localhost:4173. The existing `assets/pdf/cv.pdf` is retained;
the portfolio redesign does not update that PDF.

## Content to confirm before publishing

- BME / SIX: the end month is August; the end year still needs confirmation.
- Civitatis: current role is Platform Engineer; the start month and year still
  need confirmation. No unconfirmed responsibilities or achievements are listed.

## Validation

- Checked layout at 320, 375, 768, 1024 and 1440 CSS pixels without horizontal overflow.
- Checked internal anchor targets, unique IDs and JavaScript syntax.
- Verified all nine positions remain visible at every checked viewport, including
  Innoforma, Euroinnova and STA Villacarrillo. No experience is hidden in disclosures.
- Checked all logo images load and the SVG parses successfully.
- Browser preview used the same HTML/CSS/JS inlined because the execution sandbox
  does not allow a local HTTP server. The retained PDF was not changed.

Merge the portfolio changes into the configured GitHub Pages branch to publish
through the repository's existing Pages configuration.
