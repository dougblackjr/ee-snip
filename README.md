# ee-snip for ExpressionEngine
> String cleaner and shortener for EE2 and EE3
 
Create friendly, clean, and optionally shortened strings.

## Installing / Getting started

To install

1. Copy the ee_snip folder within the ee_plugin folder to your `user/addons` folder.
3. At your site admin panel, click `Developer`, then `Add-on Manager`.
4. Under the `Third Party Add-Ons` heading, click the EE_snip install button.

## Use
Use this plugin to clean up a string, and optionally limit the words that it returns.

This plugin is useful when making JSON feed templates in EE.

Let's say we are making a feed that contains the 10 most recent blog posts. Our template would look like:

    {
        "posts": [
            {exp:channel:entries channel="blog" status="open" dynamic="no" limit="10" orderby="date" sort="desc" show_future_entries="no" }
                { "title": {exp:ee_snip}{title}{/exp:ee_snip}, "summary": {exp:ee_snip snippet="50"}{summary}{/exp:ee_snip}
            {/exp:channel:entries}
        ]
    }