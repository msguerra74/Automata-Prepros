# Automata Prepros

## Automated Website Preprocessor

by [Michael Guerra](http://msguerra74.com)

> **Automata** – */aw-tom-uh-tuh/* – Machines that perform a function according to a predetermined set of coded instructions, especially ones capable of a range of programmed responses to different circumstances.

**Automata Prepros** is an *Automated Website Preprocessor* that utilizes [Prepros](https://prepros.io) for responsive CSS preprocessing with automatic vendor prefixing and minification, JavaScript concatenation and minification, image optimization, and an automated static development server with browser syncing and live previewing for instant browser feedback.

Additionally, [Foundation](http://foundation.zurb.com) and [WordPress](https://wordpress.org) theming support is included at no extra charge!

- [Automata Prepros GitHub page](https://github.com/msguerra74/Automata-Prepros)
- [Automata-Prepros.zip](https://github.com/msguerra74/Automata-Prepros/archive/master.zip)

### Installation

1. Download and install [Prepros](https://prepros.io) if needed.
2. Download and install [Node.js](http://nodejs.org) if needed.
3. Download and unzip [Automata-Prepros](https://github.com/msguerra74/Automata-Prepros/archive/master.zip) where you want it.
4. From the command prompt, navigate to the `Automata-Prepros` folder and type the following commands:
    - `cd _assets` and press Enter
    - `npm install foundation-sites motion-ui` and press Enter
5. That's it, now you're ready to build your web project!

### Things To Note Before Using

#### Using the HTML Template

HTML template files are located within the `_templates/html` directory and should be copied into the root of the `Automata-Prepros` directory.

- Modify any of the HTML markup and/or placeholder data as necessary.
- Modify the Developer comment at the top of the `.html` files with your information, or remove if not needed.
- Remove any files that aren't necessary and any reference to them within the `.html` files.
- Replace the `apple-touch-icon.png`, `favicon.ico`, `tile-wide.png`, and `tile.png` files with your favicon image.
- Make sure to either manually update the `feed.xml` and `sitemap.xml`, or find an automated solution.
- Add your Google Analytics ID to the Google Analytics script at the bottom of each `.html` file, or remove if not needed.

#### Using the WordPress Theme

WordPress theme files are located within the `_templates/wordpress` directory and should be copied into the root of the `Automata-Prepros` directory.

- Modify the information in `style.css`
- Modify the Developer comment at the top of the `header.php` file with your information, or remove if not needed.
- Modify any Google Web Fonts used in the `functions.php` file, or remove that line if none are used.
- Replace the `screenshot.png` file with a screenshot of your finished theme.
- Create a favicon to upload into the WordPress theme customizer.
- For Google Analytics, install a [Google Analytics plugin](https://wordpress.org/plugins/google-analytics-for-wordpress/).

### Additional Usage

You can also create a custom project inside the root of the `Automata-Prepros` directory without the use of these templates.

The `js` and `scss` files from within the `_assets` directory will be compiled into either the `assets/js` or the `assets/css` directory. Alternatively, you can remove the CSS and JS files provided and create custom `_assets` by configuring them to be compiled within Prepros.

Finally, you can delete any unnecessary files or folders from within the `Automata-Prepros` directory.

That's all there is to it!

### Components

- [Node.js](http://nodejs.org): JavaScript runtime platform used to install the following packages:
    - [Foundation](http://foundation.zurb.com): The most advanced responsive front-end framework in the world
    - [jQuery](http://jquery.com): The Write Less, Do More, JavaScript Library
    - [Motion UI](http://zurb.com/playground/motion-ui/): A Sass library for creating flexible CSS transitions and animations
- [Prepros](https://prepros.io): Prepros is a tool to compile LESS, Sass, Compass, Stylus, Jade and much more with automatic CSS prefixing, It comes with built in server for cross browser testing. It runs on Windows, Mac OS X and Linux.

## The MIT License (MIT)

Copyright (c) 2016 Michael Guerra (Automata)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.