Use this plugin to clean up a string, and optionally limit the words that it returns.

This plugin is useful when making JSON feed templates in EE.

Let's say we are making a feed that contains the 10 most recent blog posts.  Our template would look like:

------------------------------------------------

{
	"posts": [
		{exp:channel:entries channel="blog" status="open" dynamic="no" limit="10" orderby="date" sort="desc" show_future_entries="no" }
			{ "title": {exp:ee_snip}{title}{/exp:ee_snip}, "summary": {exp:ee_snip snippet="50"}{summary}{/exp:ee_snip}
		{/exp:channel:entries}
	]
}