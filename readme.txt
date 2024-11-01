=== zeitstrahler ===
Contributors: wudi96
Tags: shortcode,simple,style
Requires at least: 3.6
Tested up to: 3.9
Stable tag: 0.9
License: CC-BY-SA 3.0
License URI: http://creativecommons.org/licenses/by-sa/3.0

A simple plugin to style your content as a timeline with a few shortcodes.

== Description ==

= EN: =

This plugin provides 3 shortcodes:

**[zeitstrahler_wrapper style="grey/greyRedRound"][/zeitstrahler wrapper]**

The frame of our timeline. The other shortcodes belong inside of them. You can choose an style. It's also easy to add a new one through custom css. Do something like:
`
.zeitstrahler_wrapper.greyRedRound::before {
	background-color: rgb(76,76,76);
}

.zeitstrahler_wrapper.greyRedRound .zeitstrahler_element {
	background-color: transparent;
	border-radius: 5px;
	box-shadow: 0 0 5px 2px rgb(76,76,76);
}

.zeitstrahler_wrapper.greyRedRound .zeitstrahler_element::before {
  	border-color: rgb(76,76,76);
  	background-color: rgb(240,76,76);
}

.zeitstrahler_wrapper.greyRedRound .zeitstrahler_element_date {
	font-weight: bold;
	color: rgb(240,76,76);
}

.zeitstrahler_wrapper.greyRedRound .zeitstrahler_element_heading {
	margin-top: 0 !important;
}

.zeitstrahler_wrapper.greyRedRound .zeitstrahler_arrow::before {
	border-color: rgb(240,76,76);
}

.zeitstrahler_wrapper.greyRedRound .zeitstrahler_date span {
	background-color: rgb(240,76,76);
	color: #FFF;
	display: inline-block;
	border-radius: .2em;
	padding-left: .4em;
	padding-right: .4em;
	font-weight: bold;
}
`

**[zeitstrahler_element date="1.1.1900" heading="Birthday"]your content[/zeitstrahler_element]**

An timeline element.

**[zeitstrahler_date]1900[zeitstrahler_date]**

An big date, placed central at the timeline.


= DE: =

Dieses Plugin stellt 3 Shortcodes zu Verfügung:

**[zeitstrahler_wrapper style="grey/greyRedRound"][/zeitstrahler wrapper]**

Der Rahmenshortcodes des Ganzen. Die anderen Shortcodes sollten sich in diesem befinden. Hier kann man auch zwischen diversen Designs wählen. Durch custom css kann man auch einfach ein neues schreiben.

**[zeitstrahler_element date="1.1.1900" heading="Geburtstag"]ihr Inhalt[/zeitstrahler_element]**

Ein Zeitstrahlelement.

**[zeitstrahler_date]1900[zeitstrahler_date]**

Ein hervorgehobenes Datum.

== Installation ==

EN:

1. Upload `zeitstrahler` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Use the shortcodes.

DE:

1. Lade den Ordner 'zeitstrahler'  in '/wp-content/plugins/' hoch.
1. Aktiviere das Plugin im 'Plugin' Menü von WordPRess.
1. Benutze die Shortcodes.

== Frequently Asked Questions ==

== Screenshots ==

1. The structure of the shortcodes
2. the result

== Changelog ==

= 0.9 =
First release

== Upgrade Notice ==
