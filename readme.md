*This is a modified version of a theme by Gavick Themes (https://www.gavick.com/wordpress-themes/events). As of Sept 2017, they've updated their main theme to 1.9, whereas this theme diverged around 1.1.12 so there may be incompatibilities. I've found their themes not to function consistently as parent themes with child themes for the projects, so I've unfortunately had to modify the original.

Here's some of the routine things that are changed for each new year. 

# Background Images

There are two files referenced. One for the homepage, and one for the interior pages. The interior pages (such as artist or show pages) have an image which doesn't have the faces or indian on it, so it's easier to read the content. The homepage image will be swapped out as defined through frontpage.scss.

# Colors

To change the color for the header text, change the definition of the SASS variable $primary within variables.scss

The background artist image (currently a coffin) hovers to the color defined within the theme customizer, which is through the wordpress backend. http://dazeofthedead.com/wp-admin/customize.php?return=%2Fwp-admin%2Fpost.php%3Fpost%3D1227%26action%3Dedit

# Logos

## Floating Logo
This is definied by uploading an image to the media library and selecting it through the cuztomizer>features. While you're at it, go ahead and change the copyright date in the "Copyright text" section there.

## Homepage Logo
This is selected through the WordPress page for the homepage. Just swap out the image path.

# Site Structure and Organization

The homepage is set to display sections such as ARTISTS and EVENTS if you include seperate pages for those as subpages of the Frontpage. 


