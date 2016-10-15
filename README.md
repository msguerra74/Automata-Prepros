# Automata Prepros

## Automated Website Preprocessor

by [Michael Guerra](http://msguerra74.com)

> **Automata** – */aw-tom-uh-tuh/* – Machines that perform a function according to a predetermined set of coded instructions, especially ones capable of a range of programmed responses to different circumstances.

**Automata Prepros** is an *Automated Website Preprocessor* that utilizes Prepros for responsive CSS preprocessing with automatic vendor prefixing and minification, JavaScript concatenation and minification, and image optimization, plus Bower asset management and an automated static development server with brower syncing and live previewing for instant browser feedback.

Additionally, [Foundation](http://foundation.zurb.com) and [WordPress](https://wordpress.org) theming support is included at no extra charge!

- [Automata Prepros GitHub page](https://github.com/msguerra74/Automata-Prepros)
- [Automata-Prepros.zip](https://github.com/msguerra74/Automata-Prepros/archive/master.zip)

### Installation

1. Download and install [Prepros](https://prepros.io).
2. Download and install [Node.js](http://nodejs.org) if needed *(for Bower)*..
3. Download and unzip [Automata-Prepros.zip](https://github.com/msguerra74/Automata-Prepros/archive/master.zip) where you want it.
4. From the command prompt, navigate to the `Automata-Prepros` folder and type the following commands:
    - `sudo npm install -g bower`
    - `bower install`
    - **Note:** if you're installing on Windows, you do not need to begin commands with `sudo`
5. That's it, now you're ready to build your web project!

### Things To Note Before Using

#### HTML

Files location within the `_templates/html` directory.

- Modify any of the HTML structure and/or placeholder data as necessary.
- Remove any files that aren't necessary and any reference to them within the `.html` files.
- Replace the `apple-touch-icon.png`, `favicon.ico`, `tile-wide.png`, and `tile.png` files with your favicon image.

#### WordPress

Files location within the `_templates/wordpress` directory.

- Search this directory for `example_theme` and replace with your theme name.
- Modify the information in `style.css`
- Modify any Google Web Fonts used in the `functions.php` file, or that line if none are used.
- Modify the Developer comment at the top of the `header.php` file.
- Add your Google Analytics ID to the Google Analytics script at the bottom of the `footer.php` file.
- Replace the `screenshot.png` file with a screenshot of your finished theme.
- Create a favicon to upload into the WordPress theme customizer.

### Usage

Copy whichever template you want to use from within the `_templates` directory, to the `website` directory. If you wish, you can create a custom project inside the `website` directory without the use of the templates.

**Note:** The `website` directory is not created until Prepros has processed files, so you may need to create a folder called `website` prior to compiling in order to copy over the template files, or create a custom project.

Additionally, you can remove the provided CSS and JS and start from scratch there too, as long as you remember to add those files into Prepros to be compiled.

That's all there is to it!

### Components

- [Markdown](http://daringfireball.net/projects/markdown): Text-to-HTML conversion tool
- [Node.js](http://nodejs.org): JavaScript runtime platform
    - [Bower](https://bower.io): A package manager for the web
        - **Bower Dependencies:**
        - [Foundation](http://foundation.zurb.com): The most advanced responsive front-end framework in the world
        - [Motion UI](http://zurb.com/playground/motion-ui/): A Sass library for creating flexible CSS transitions and animations
- [Prepros](https://prepros.io): Prepros is a tool to compile LESS, Sass, Compass, Stylus, Jade and much more with automatic CSS prefixing, It comes with built in server for cross browser testing. It runs on Windows, Mac OS X and Linux.

## The MIT License (MIT)

Copyright (c) 2016 Michael Guerra (Automata)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.