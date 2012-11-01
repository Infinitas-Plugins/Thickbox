Drop this into the plugins dir and give your links the class of "thickbox" and the rest is magic. Css and Js are automaticaly injected into the layout using the onRequireJs / onRequireCss Events. By default it will automaticaly be a vailable on any page in the frontend of your site.

You may adjust the private method `\_\_needAssets()` if you need to change where thickbox is available. eg  if you want it all over `admin` / `fronend` just return `true`, if you just want it for a certain `controller/action` pair something like 

	return $data['controller'] == 'controller' && $data['action'] == 'action';

### Options

#### Size

Add `?height=300&width=300` to your url to set a size of 300x300 if you dont add sizes it will default to 630x440

As a string

	$this->Html->link('my link', '/controller/action/?height=300&width=300', array(
		'class' => 'thickbox'
	));


As an array

	array(
		'controller' => 'controller',
		'action' => 'action',
		'?height=300&width=300'
	)

#### Iframe

Add `TB\_iframe=true` to open the content in an `iframe`

#### Modal box 

Add `modal=true` to the url so that only clicking close will close the popup

#### Inline content 

add `inlineId=xyz` where xyz is the `id` of the content you want displayed.

#### As a gallery

Use `rel` to group images together. images with the same `rel` attribute will display in the gallery together.


### Usage

#### Single image

	$this->Html->link(
		$this->Html->image('image.png'),
		'/img/image.png',
		array(
			'class' => 'thickbox'
		)
	);

#### Gallery

Sets of images with next / prev buttons

	$this->Html->link(
		$this->Html->image('image1.png'),
		'/img/image1.png',
		array(
			'class' => 'thickbox',
			'rel' => 'my-gallery-1'
		)
	);
	
	$this->Html->link(
		$this->Html->image('image2.png'),
		'/img/image2.png',
		array(
			'class' => 'thickbox',
			'rel' => 'my-gallery-1'
		)
	);
	
	$this->Html->link(
		$this->Html->image('image3.png'),
		'/img/image3.png',
		array(
			'class' => 'thickbox',
			'rel' => 'my-gallery-2'
		)
	);

	$this->Html->link(
		$this->Html->image('image4.png'),
		'/img/image4.png',
		array(
			'class' => 'thickbox',
			'rel' => 'my-gallery-2'
		)
	);

You can also use the keyboard to move through the gallery, and the images will be displayed in the same order they are in in the html

#### Inline content

	$this->Html->link(
		'cool link',
		'#TB\_inline?height=300&width=300&inlineId=myContent',
		array(
			'class' => 'thickbox'
		)
	);

where you would have something like the following in your page.

	<div id="myContent">...blaa blaa...</div>

If the inline content in the Thickbox contains more content than the Thickbox dimensions will show, a vertical scroll bar will appear so that the content can be scrolled. You can avoid having the scroll by making sure the ThickBox has the appropriate dimensions in order to show all of the inline content without having to scroll. In other words, if you don't want scroll bars, increase the height and width of the Thickbox until the content does not require scrolling.

#### Iframe content

	$this->Html->link(
		'google',
		'http://google.co.uk/?q=some+search&TB\_iframe=true&height=400&width=600',
		array(
			'class' => 'thickbox'
		)
	);

> Add all other query parameters before the `TB\_iframe` parameters. Everything after the `TB` is removed from the URL.

#### Ajax content

	$this->Html->link(
		'some ajax',
		array(
			'controller' => 'controller',
			'action' => 'action',
			123 // passed params
		)
		array(
			'class' => 'thickbox'
		)
	);

Making use of this plugin does not create a dependency for it. For example if you have created links using the `thickbox` class with url parameters and the plugin is not available the links will be loaded like a normal link. This means that instead of content being loaded via `AJAX` the browser will make a normal request. Similarly if used for an image gallery the images will be opened in a window with no other conent.

> If you are viewing the docs on [http://infinitas-cms.org](http://infinitas-cms.org) or locally and have the Thickbox plugin enabled, the images displade in the box make use of this plugin.