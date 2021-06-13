<!-- search -->
<form id="searchForm" class="search-form" method="get" action="<?php echo home_url(); ?>" role="search">
	<input class="input search-form__input" id="searchInput" type="search" name="s" placeholder="<?php _e( 'Suche', 'html5blank' ); ?>" required />
	<button id="searchSubmit" class="search-form__submit button--icon button--black" type="submit" role="button"><i class="icon icon__search"></i></button>
</form>

<div class="search-form__toggle-wrapper">
	<button id="hideSearch" class="search-form__toggle search-form__toggle--hide button--icon button--black" role="button"><i class="icon icon__close"></i></button>
	<button id="showSearch" class="search-form__toggle search-form__toggle--show show button--icon button--black" role="button"><i class="icon icon__search"></i></button>
</div>




