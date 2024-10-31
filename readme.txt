=== QuoteWorthy ===
Contributors: greeney92
Donate link: http://www.shannon-green.com
Tags: widget,sidebar,quote,lyrics
Requires at least: 2.0.2
Tested up to: 2.6.1
Stable tag: 1.1

Displays a randomly chosen quote/song lyric/whatever from a list that you provide in the sidebar as a widget.

== Description ==

A widget that takes a user-provided list of quotes, song lyrics, etc. delimited by newlines, chooses one randomly and displays it as a widget in the sidebar. Has an Options page located under Settings (>=2.5) or Options(<2.5).

== Installation ==

1. Upload `quoteworthy.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Set the title and the quotes on the options page, located under Settings (for WP >= 2.5) or Options (for < 2.5).
1. Add the QuoteWorthy widget to the sidebar on the 'Widgets' page.

== Frequently Asked Questions ==

= Can I use HTML in my quotes? =

Yes, you can. In fact, you can use unfiltered HTML at the moment - be a little careful with that, won't you? I'd hate for you to get XSS'ed.

= How many quotes can I have? =

I honestly don't know. I haven't hit a limit yet, though.

= How can I style the quotes? =

The entire widget, including the header, is given an ID of 'quoteworthy' and a class of 'widget_quoteworthy'. This allows you to style it with CSS - for example, #quoteworthy {color: #ff0000;}.
You can also (as of version 1.1) add tags to surround the quotes via the configuration page, and add your own style information to them - for example, <p class='quote-text'>...</p> or <div style="font-style: italic;">...</div>

== Screenshots ==

1. Running under Wordpress 2.5 on my home page. 