# Join DXN Page Style Guide

Source references:
- Screenshot: `d:/All Downloads/screencapture-freedomwithdxn-join-2026-04-16-15_29_45.png`
- Main view: [laravel-server/resources/views/pages/join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:96)

## Overall Design Direction

The `Join DXN` page uses a premium motivational landing-page style:

- strong dark-violet hero and CTA bands
- light lavender content sections for breathing space
- white cards for trust, benefits, referral, zoom, and FAQ
- gold and green used as accent colors for trust, action, and status
- rounded corners everywhere with soft shadows and glow effects
- centered layout with high contrast headline-first storytelling

The page alternates between:

1. dark immersive sections
2. light editorial/card sections
3. strong CTA moments

That creates a rhythm of:
`emotion -> trust -> explanation -> action`

## Color System

Defined in [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:98):

```css
--dxn-violet: #46387b;
--dxn-violet-dark: #2c1c5f;
--dxn-green: #43af73;
--dxn-red: #bf3c36;
--dxn-gold: #c9a84c;
```

Supporting neutrals:

- page text: `#1c1c1c`
- muted text: `#6b7280`
- light section background: `#f7f5fc`
- card border: `#ececf5`
- white overlays: `rgba(255,255,255,...)`

## Typography

Primary type system:

- font family: `'DM Sans', 'DM Sans Fallback', 'Inter', system-ui, sans-serif`
- headings use bold weight with slight negative letter spacing
- large hero headline uses `clamp(...)` sizing for responsive scale
- eyebrow labels use uppercase, high tracking, and small font size

Typography feel:

- modern
- confident
- clean
- conversion-oriented

## Layout Structure

Page structure from [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:295):

1. Hero
2. Trust bar
3. Video section
4. Benefits section
5. Steps timeline
6. Referral spotlight
7. Zoom schedule
8. FAQ
9. Final CTA

Common layout rules:

- content max width usually `960px`, `1120px`, or `1160px`
- generous vertical padding with `clamp(70px, 10vw, 120px)` or similar
- centered section headings
- cards arranged in clean desktop grids that collapse on mobile

## Hero Style

Hero styles are defined around [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:108).

Visual characteristics:

- dark violet base background
- floating blurred radial orbs
- gold-highlighted “Yes”
- glassy referral pill
- pill CTAs

Important details:

- background is not flat; it uses layered radial glows
- the word `Yes` is italic and underlined with an animated gradient line
- CTAs are centered and stacked vertically on small screens

## Button System

Main button styles are defined at [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:158).

### Primary CTA

- class: `.btn-hero-primary`
- background: `#43af73`
- text: white
- rounded pill shape
- shadow: green glow
- hover:
  - moves up `-2px`
  - deeper shadow
  - slightly darker green background

### Outline CTA

- class: `.btn-hero-outline`
- transparent background
- white border
- white text
- hover:
  - fills white
  - text turns dark violet
  - border becomes white
  - moves up `-2px`

### Referral CTA

- class: `.btn-referral`
- same green family as primary CTA
- pill button with shadow
- hover mirrors primary CTA behavior

## Card Design Pattern

The page uses one consistent card language across benefits, zoom, FAQ, and referral:

- white background
- soft border `#ececf5`
- rounded corners `14px` to `24px`
- subtle shadow on rest
- stronger shadow on hover/open state
- top accent line on hover or as a permanent decorative strip

### Benefit Cards

Defined at [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:189).

Behavior:

- hover lifts card by `6px`
- shadow increases
- top gradient line animates in from left to right

Gradient accent:

```css
linear-gradient(90deg, var(--dxn-green), var(--dxn-gold), var(--dxn-red))
```

### Zoom Cards

Defined at [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:230).

Behavior matches benefit cards:

- white card
- soft border
- animated gradient top bar
- hover lift
- stronger violet shadow

### FAQ Cards

Defined at [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:245).

Behavior:

- inactive state is flat white
- active/open state gets shadow
- plus icon rotates to an `x`-like state
- green toggle becomes red on open

## Section-by-Section Style Notes

### Trust Bar

Defined at [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:165).

- white band
- thin bottom border
- 4-column stat grid
- large violet numbers
- small muted uppercase labels

Purpose:
- credibility
- scale
- quick validation

### Video Section

Defined at [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:171).

- almost black background
- subtle violet radial overlay
- framed video container with multicolor gradient border
- strong cinematic contrast

The frame uses:

```css
linear-gradient(135deg, var(--dxn-violet), var(--dxn-green) 40%, var(--dxn-gold) 70%, var(--dxn-red))
```

### Benefits Section

- light lavender section background
- 3-column grid
- white cards
- used to explain value proposition

### Steps Section

Defined at [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:202).

- dark violet background
- vertical timeline
- circular step number badges
- gold accents
- white headings with muted white descriptions

This is the most “guided journey” part of the page.

### Referral Spotlight

Defined at [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:217).

- centered single card
- strong emphasis on referral code
- top multicolor strip
- dashed code box
- premium/personal-invitation feeling

### Zoom Schedule

- white background section
- simple card grid
- less dramatic than hero/steps
- designed for clarity and commitment reduction

### Final CTA

Defined at [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:256).

- dark violet band
- blurred gold and green radial glows
- large centered white headline
- reused hero CTA style for consistency

## Motion and Interaction

Main motion system:

- hover lift on cards and buttons
- shadow deepening on hover
- top-border gradient reveal on cards
- pulse animation in hero tag dot
- drifting orb animations in hero
- reveal-on-scroll with IntersectionObserver

Reveal behavior from [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:265):

- initial state: `opacity: 0`, `translateY(28px)`
- in-view state: visible and reset transform
- duration: `0.8s ease`

This gives the page a polished but not noisy feel.

## Border Radius and Shadows

Common radius values:

- pills/buttons: `100px`
- small cards: `14px` to `16px`
- spotlight card: `24px`
- video inner frame: `16px`
- video outer wrapper: `20px`

Common shadow behavior:

- rest state: soft and low-contrast
- hover state: larger and tinted slightly toward violet or green

## Responsive Behavior

Defined at [join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:269).

At `max-width: 900px`:

- benefits grid becomes 2 columns
- zoom grid becomes 2 columns
- trust grid becomes 2 columns
- step timeline tightens

At `max-width: 560px`:

- benefits grid becomes 1 column
- zoom grid becomes 1 column
- CTA buttons stack full width
- FAQ spacing and typography shrink slightly

RTL support:

- timeline line moves from left to right when `dir="rtl"`

## Design Personality Summary

The page style can be summarized as:

- premium but approachable
- bold but clean
- persuasive without feeling aggressive
- emotionally warm through gold/green accents
- structured and trustworthy through white cards and strong spacing

## Reuse Rules

If you want new sections to match this page, keep these rules:

- use `var(--dxn-violet-dark)` for major CTA/hero backgrounds
- use `#f7f5fc` for calm explanatory sections
- use white cards with `#ececf5` borders
- use pill buttons with soft shadows
- use gradient accent lines for interactive cards
- use centered section heads with eyebrow + title + short subtext
- keep hover motion subtle: `translateY(-2px)` for buttons, `translateY(-6px)` for cards
- prefer blurred radial background shapes over flat decorative blocks

## Recommended File Ownership

Primary style source:
- [laravel-server/resources/views/pages/join.blade.php](/i:/Claude/grow-with-dxn/laravel-server/resources/views/pages/join.blade.php:96)

If this design system grows, consider extracting:

- color tokens
- button styles
- card styles
- section heading styles
- reveal animation styles

into a shared stylesheet so other landing pages can match it exactly.
