




<style>



@charset "UTF-8";

/*!
 * Bootstrap  v5.2.3 (https://getbootstrap.com/)
 * Copyright 2011-2022 The Bootstrap Authors
 * Copyright 2011-2022 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 */
:root {
    --bs-blue: #0d6efd;
    --bs-indigo: #6610f2;
    --bs-purple: #6f42c1;
    --bs-pink: #d63384;
    --bs-red: #dc3545;
    --bs-orange: #fd7e14;
    --bs-yellow: #ffc107;
    --bs-green: #198754;
    --bs-teal: #20c997;
    --bs-cyan: #0dcaf0;
    --bs-black: #000;
    --bs-white: #fff;
    --bs-gray: #6c757d;
    --bs-gray-dark: #343a40;
    --bs-gray-100: #f8f9fa;
    --bs-gray-200: #e9ecef;
    --bs-gray-300: #dee2e6;
    --bs-gray-400: #ced4da;
    --bs-gray-500: #adb5bd;
    --bs-gray-600: #6c757d;
    --bs-gray-700: #495057;
    --bs-gray-800: #343a40;
    --bs-gray-900: #212529;
    --bs-primary: #0d6efd;
    --bs-secondary: #6c757d;
    --bs-success: #198754;
    --bs-info: #0dcaf0;
    --bs-warning: #ffc107;
    --bs-danger: #dc3545;
    --bs-light: #f8f9fa;
    --bs-dark: #212529;
    --bs-primary-rgb: 13, 110, 253;
    --bs-secondary-rgb: 108, 117, 125;
    --bs-success-rgb: 25, 135, 84;
    --bs-info-rgb: 13, 202, 240;
    --bs-warning-rgb: 255, 193, 7;
    --bs-danger-rgb: 220, 53, 69;
    --bs-light-rgb: 248, 249, 250;
    --bs-dark-rgb: 33, 37, 41;
    --bs-white-rgb: 255, 255, 255;
    --bs-black-rgb: 0, 0, 0;
    --bs-body-color-rgb: 33, 37, 41;
    --bs-body-bg-rgb: 255, 255, 255;
    --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
    --bs-body-font-family: var(--bs-font-sans-serif);
    --bs-body-font-size: 1rem;
    --bs-body-font-weight: 400;
    --bs-body-line-height: 1.5;
    --bs-body-color: #212529;
    --bs-body-bg: #fff;
    --bs-border-width: 1px;
    --bs-border-style: solid;
    --bs-border-color: #dee2e6;
    --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
    --bs-border-radius: 0.375rem;
    --bs-border-radius-sm: 0.25rem;
    --bs-border-radius-lg: 0.5rem;
    --bs-border-radius-xl: 1rem;
    --bs-border-radius-2xl: 2rem;
    --bs-border-radius-pill: 50rem;
    --bs-link-color: #0d6efd;
    --bs-link-hover-color: #0a58ca;
    --bs-code-color: #d63384;
    --bs-highlight-bg: #fff3cd
}

*,
::after,
::before {
    box-sizing: border-box
}

@media (prefers-reduced-motion:no-preference) {
    :root {
        scroll-behavior: smooth
    }
}

body {
    margin: 0;
    font-family: var(--bs-body-font-family);
    font-size: var(--bs-body-font-size);
    font-weight: var(--bs-body-font-weight);
    line-height: var(--bs-body-line-height);
    color: var(--bs-body-color);
    text-align: var(--bs-body-text-align);
    background-color: var(--bs-body-bg);
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent
}

hr {
    margin: 1rem 0;
    color: inherit;
    border: 0;
    border-top: 1px solid;
    opacity: .25
}

.h1,
.h2,
.h3,
.h4,
.h5,
.h6,
h1,
h2,
h3,
h4,
h5,
h6 {
    margin-top: 0;
    margin-bottom: .5rem;
    font-weight: 500;
    line-height: 1.2
}

.h1,
h1 {
    font-size: calc(1.375rem + 1.5vw)
}

@media (min-width:1200px) {

    .h1,
    h1 {
        font-size: 2.5rem
    }
}

.h2,
h2 {
    font-size: calc(1.325rem + .9vw)
}

@media (min-width:1200px) {

    .h2,
    h2 {
        font-size: 2rem
    }
}

.h3,
h3 {
    font-size: calc(1.3rem + .6vw)
}

@media (min-width:1200px) {

    .h3,
    h3 {
        font-size: 1.75rem
    }
}

.h4,
h4 {
    font-size: calc(1.275rem + .3vw)
}

@media (min-width:1200px) {

    .h4,
    h4 {
        font-size: 1.5rem
    }
}

.h5,
h5 {
    font-size: 1.25rem
}

.h6,
h6 {
    font-size: 1rem
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

abbr[title] {
    -webkit-text-decoration: underline dotted;
    text-decoration: underline dotted;
    cursor: help;
    -webkit-text-decoration-skip-ink: none;
    text-decoration-skip-ink: none
}

address {
    margin-bottom: 1rem;
    font-style: normal;
    line-height: inherit
}

ol,
ul {
    padding-left: 2rem
}

dl,
ol,
ul {
    margin-top: 0;
    margin-bottom: 1rem
}

ol ol,
ol ul,
ul ol,
ul ul {
    margin-bottom: 0
}

dt {
    font-weight: 700
}

dd {
    margin-bottom: .5rem;
    margin-left: 0
}

blockquote {
    margin: 0 0 1rem
}

b,
strong {
    font-weight: bolder
}

.small,
small {
    font-size: .875em
}

.mark,
mark {
    padding: .1875em;
    background-color: var(--bs-highlight-bg)
}

sub,
sup {
    position: relative;
    font-size: .75em;
    line-height: 0;
    vertical-align: baseline
}

sub {
    bottom: -.25em
}

sup {
    top: -.5em
}

a {
    color: var(--bs-link-color);
    text-decoration: underline
}

a:hover {
    color: var(--bs-link-hover-color)
}

a:not([href]):not([class]),
a:not([href]):not([class]):hover {
    color: inherit;
    text-decoration: none
}

code,
kbd,
pre,
samp {
    font-family: var(--bs-font-monospace);
    font-size: 1em
}

pre {
    display: block;
    margin-top: 0;
    margin-bottom: 1rem;
    overflow: auto;
    font-size: .875em
}

pre code {
    font-size: inherit;
    color: inherit;
    word-break: normal
}

code {
    font-size: .875em;
    color: var(--bs-code-color);
    word-wrap: break-word
}

a>code {
    color: inherit
}

kbd {
    padding: .1875rem .375rem;
    font-size: .875em;
    color: var(--bs-body-bg);
    background-color: var(--bs-body-color);
    border-radius: .25rem
}

kbd kbd {
    padding: 0;
    font-size: 1em
}

figure {
    margin: 0 0 1rem
}

img,
svg {
    vertical-align: middle
}

table {
    caption-side: bottom;
    border-collapse: collapse
}

caption {
    padding-top: .5rem;
    padding-bottom: .5rem;
    color: #6c757d;
    text-align: left
}

th {
    text-align: inherit;
    text-align: -webkit-match-parent
}

tbody,
td,
tfoot,
th,
thead,
tr {
    border-color: inherit;
    border-style: solid;
    border-width: 0
}

label {
    display: inline-block
}

button {
    border-radius: 0
}

button:focus:not(:focus-visible) {
    outline: 0
}

button,
input,
optgroup,
select,
textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit
}

button,
select {
    text-transform: none
}

[role=button] {
    cursor: pointer
}

select {
    word-wrap: normal
}

select:disabled {
    opacity: 1
}

[list]:not([type=date]):not([type=datetime-local]):not([type=month]):not([type=week]):not([type=time])::-webkit-calendar-picker-indicator {
    display: none !important
}

[type=button],
[type=reset],
[type=submit],
button {
    -webkit-appearance: button
}

[type=button]:not(:disabled),
[type=reset]:not(:disabled),
[type=submit]:not(:disabled),
button:not(:disabled) {
    cursor: pointer
}

::-moz-focus-inner {
    padding: 0;
    border-style: none
}

textarea {
    resize: vertical
}

fieldset {
    min-width: 0;
    padding: 0;
    margin: 0;
    border: 0
}

legend {
    float: left;
    width: 100%;
    padding: 0;
    margin-bottom: .5rem;
    font-size: calc(1.275rem + .3vw);
    line-height: inherit
}

@media (min-width:1200px) {
    legend {
        font-size: 1.5rem
    }
}

legend+* {
    clear: left
}

::-webkit-datetime-edit-day-field,
::-webkit-datetime-edit-fields-wrapper,
::-webkit-datetime-edit-hour-field,
::-webkit-datetime-edit-minute,
::-webkit-datetime-edit-month-field,
::-webkit-datetime-edit-text,
::-webkit-datetime-edit-year-field {
    padding: 0
}

::-webkit-inner-spin-button {
    height: auto
}

[type=search] {
    outline-offset: -2px;
    -webkit-appearance: textfield
}

::-webkit-search-decoration {
    -webkit-appearance: none
}

::-webkit-color-swatch-wrapper {
    padding: 0
}

::-webkit-file-upload-button {
    font: inherit;
    -webkit-appearance: button
}

::file-selector-button {
    font: inherit;
    -webkit-appearance: button
}

output {
    display: inline-block
}

iframe {
    border: 0
}

summary {
    display: list-item;
    cursor: pointer
}

progress {
    vertical-align: baseline
}

[hidden] {
    display: none !important
}

.lead {
    font-size: 1.25rem;
    font-weight: 300
}

.display-1 {
    font-size: calc(1.625rem + 4.5vw);
    font-weight: 300;
    line-height: 1.2
}

@media (min-width:1200px) {
    .display-1 {
        font-size: 5rem
    }
}

.display-2 {
    font-size: calc(1.575rem + 3.9vw);
    font-weight: 300;
    line-height: 1.2
}

@media (min-width:1200px) {
    .display-2 {
        font-size: 4.5rem
    }
}

.display-3 {
    font-size: calc(1.525rem + 3.3vw);
    font-weight: 300;
    line-height: 1.2
}

@media (min-width:1200px) {
    .display-3 {
        font-size: 4rem
    }
}

.display-4 {
    font-size: calc(1.475rem + 2.7vw);
    font-weight: 300;
    line-height: 1.2
}

@media (min-width:1200px) {
    .display-4 {
        font-size: 3.5rem
    }
}

.display-5 {
    font-size: calc(1.425rem + 2.1vw);
    font-weight: 300;
    line-height: 1.2
}

@media (min-width:1200px) {
    .display-5 {
        font-size: 3rem
    }
}

.display-6 {
    font-size: calc(1.375rem + 1.5vw);
    font-weight: 300;
    line-height: 1.2
}

@media (min-width:1200px) {
    .display-6 {
        font-size: 2.5rem
    }
}

.list-unstyled {
    padding-left: 0;
    list-style: none
}

.list-inline {
    padding-left: 0;
    list-style: none
}

.list-inline-item {
    display: inline-block
}

.list-inline-item:not(:last-child) {
    margin-right: .5rem
}

.initialism {
    font-size: .875em;
    text-transform: uppercase
}

.blockquote {
    margin-bottom: 1rem;
    font-size: 1.25rem
}

.blockquote>:last-child {
    margin-bottom: 0
}

.blockquote-footer {
    margin-top: -1rem;
    margin-bottom: 1rem;
    font-size: .875em;
    color: #6c757d
}

.blockquote-footer::before {
    content: "— "
}

.img-fluid {
    max-width: 100%;
    height: auto
}

.img-thumbnail {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid var(--bs-border-color);
    border-radius: .375rem;
    max-width: 100%;
    height: auto
}

.figure {
    display: inline-block
}

.figure-img {
    margin-bottom: .5rem;
    line-height: 1
}

.figure-caption {
    font-size: .875em;
    color: #6c757d
}

.container,
.container-fluid,
.container-lg,
.container-md,
.container-sm,
.container-xl,
.container-xxl {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    width: 100%;
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5);
    margin-right: auto;
    margin-left: auto
}

@media (min-width:576px) {

    .container,
    .container-sm {
        max-width: 540px
    }
}

@media (min-width:768px) {

    .container,
    .container-md,
    .container-sm {
        max-width: 720px
    }
}

@media (min-width:992px) {

    .container,
    .container-lg,
    .container-md,
    .container-sm {
        max-width: 960px
    }
}

@media (min-width:1200px) {

    .container,
    .container-lg,
    .container-md,
    .container-sm,
    .container-xl {
        max-width: 1140px
    }
}

@media (min-width:1400px) {

    .container,
    .container-lg,
    .container-md,
    .container-sm,
    .container-xl,
    .container-xxl {
        max-width: 1320px
    }
}

.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-.5 * var(--bs-gutter-x));
    margin-left: calc(-.5 * var(--bs-gutter-x))
}

.row>* {
    flex-shrink: 0;
    width: 100%;
    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5);
    margin-top: var(--bs-gutter-y)
}

.col {
    flex: 1 0 0%
}

.row-cols-auto>* {
    flex: 0 0 auto;
    width: auto
}

.row-cols-1>* {
    flex: 0 0 auto;
    width: 100%
}

.row-cols-2>* {
    flex: 0 0 auto;
    width: 50%
}

.row-cols-3>* {
    flex: 0 0 auto;
    width: 33.3333333333%
}

.row-cols-4>* {
    flex: 0 0 auto;
    width: 25%
}

.row-cols-5>* {
    flex: 0 0 auto;
    width: 20%
}

.row-cols-6>* {
    flex: 0 0 auto;
    width: 16.6666666667%
}

.col-auto {
    flex: 0 0 auto;
    width: auto
}

.col-1 {
    flex: 0 0 auto;
    width: 8.33333333%
}

.col-2 {
    flex: 0 0 auto;
    width: 16.66666667%
}

.col-3 {
    flex: 0 0 auto;
    width: 25%
}

.col-4 {
    flex: 0 0 auto;
    width: 33.33333333%
}

.col-5 {
    flex: 0 0 auto;
    width: 41.66666667%
}

.col-6 {
    flex: 0 0 auto;
    width: 50%

</style>