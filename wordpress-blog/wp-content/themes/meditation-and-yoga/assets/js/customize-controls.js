( function( api ) {

	// Extends our custom "meditation-and-yoga" section.
	api.sectionConstructor['meditation-and-yoga'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );