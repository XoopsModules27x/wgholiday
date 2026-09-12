# wgHoliday

If e.g. your company is closed for a certain period for holidays then  it is nice if you can show a modal window with important information when someone is visiting your website.

**wgHoliday** is a holiday and event management module for the [XOOPS CMS](https://xoops.org/).

**wgHoliday** can therefore be used for public holidays as well as general announcements, seasonal information or other time-dependent content.

The module provides a simple way to create, manage and display holidays and other events on a XOOPS website. Events can contain a title, description, header, body, footer and image, and can be configured with individual display periods and visibility settings.

## Features

* Create and manage holidays and events
* The events will be displayed with a block and with a modal window

## Requirements

The current version requires:

| Requirement | Version        |
| ----------- |----------------|
| XOOPS       | 2.7.3 or later |
| PHP         | 8.4 or later   |

The module is developed for the current XOOPS 2.7.x generation.

## Installation

1. Download the latest release of **wgHoliday** from GitHub.

2. Extract the module archive.

3. Copy the `wgholiday` directory to:

   ```text
   /modules/
   ```

4. Log in to the XOOPS administration area.

5. Open **System → Modules**.

6. Install **wgHoliday**.

7. Configure the module according to your requirements.

The module contains its own installation, update and uninstall handlers.

For a standard XOOPS installation, no additional installation procedure is required.

## Usage

After installation, the module provides several front-end functions.

### Events

Events can be created and managed with the following information:

* Event name/title
* Header
* Body
* Footer
* Image
* Flexible validity type
* Flexible display mode for event elements

### Display modes

Each event can be configured independently.

Available options are:

| Display mode     | Description                                            |
| ---------------- | ------------------------------------------------------ |
| `Do not display` | The event is not displayed on the website              |
| `Website`        | Display the event on the website                       |
| `Modal`          | Display the event in a modal window                    |
| `Both`           | Display the event on the website and in a modal window |

### Image positions

An event image can be displayed at different positions:

* Before the event body
* On the left side of the body
* On the right side of the body
* After the event body

### Validity type
* Configure by simple on- or offline status
* Configure an individual display period for each event

    * Start displaying date
    * End displaying date
    * Display of current status
        * Waiting
        * Running
        * Closed

## Events Spotlight Block

wgHoliday includes an **Events Spotlight** block.

The block can be used to highlight selected events outside the main module pages and can be configured through the normal XOOPS block administration.

This makes it possible to show upcoming or important holidays/events in a sidebar or another block position supported by the active XOOPS theme.

All block information will also be shown as a modal window.

## Administration

The administration area provides functionality for managing the module and its events.

Available event operations include:

* **Add Events**
* **Edit Events**
* **Delete Events**
* **Clone Events**
* **Event Details**
* **List of Events**

The module also provides an administration dashboard and module information page.

## Configuration

The module provides several configuration options, including:

* Meta description
* Meta keywords
* Editor selection
* Maximum number of characters for the editor
* Image upload settings

The exact available options depend on the installed version and the capabilities of the XOOPS installation.

## Support

For questions, bug reports and general support, please use the XOOPS community forums:

https://xoops.org/modules/newbb

For source code, issues and contributions, visit the GitHub repository:

https://github.com/ggoffy/wgholiday

## Development

wgHoliday is developed by **Goffy / Wedega** .

Author:

**Goffy – Wedega**
Website: https://wedega.com
Email: [webmaster@wedega.com](mailto:webmaster@wedega.com)

Credits:
* Goffy – Wedega


## Contributing

Contributions are welcome.

If you find a bug or have an idea for an improvement:

1. Check the existing GitHub issues.
2. Create a new issue if necessary.
3. Fork the repository.
4. Make your changes.
5. Test your changes with a supported XOOPS installation.
6. Submit a pull request.

Please keep changes compatible with the supported XOOPS and PHP versions.

## License

wgHoliday is released under the **GNU General Public License, version 2.0 or later (GPL-2.0-or-later)**.

See the [GNU General Public License](https://www.gnu.org/licenses/gpl-3.0.en.html) for details.

---

**wgHoliday** — Holiday and event management for XOOPS.
