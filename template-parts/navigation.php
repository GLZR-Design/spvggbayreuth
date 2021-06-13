<!--- navigation --->


	 <nav class="menu" role="navigation">
	 	<ul class="menu__list">		
	 		<?php $menuArray = wp_get_nav_menu_items("header") ;
            $i = 0;
            $subMenuArray = array();
            $parentArray = array();
	 		foreach($menuArray as $menuItemObject) {
	 			if (!($menuItemObject->menu_item_parent)) {
	 				$parentID = $menuItemObject->ID;
                     echo "<li id='menu-$parentID' class='menu__item is-hoverbox-black'><a href='$menuItemObject->url' >$menuItemObject->title</a>";
                    $subMenuArray[$parentID] = array();
                    $parentArray[$parentID] = $menuItemObject->title;
                                     
	 				if($menuArray[$i+1]->menu_item_parent == $parentID) {
                        $j = 0; 
	 					while($menuArray[++$i]->menu_item_parent == $parentID) {
	 						$menuItemObjectChild = $menuArray[$i];
	 						$childID = $menuArray[$i]->ID;
                            $subMenuArray[$parentID][$j] = [
                                "id" => $childID,
                                "title" => $menuItemObjectChild->title,
                                "slug" => make_lowercase($menuItemObjectChild->title),
                                "url" => $menuItemObjectChild->url,
                                "child" => false
                            ];
	 						if($menuArray[$i+1]->menu_item_parent == $childID) {
                                $subsubMenuArray = array();
                                $x = 0;
	 							while($menuArray[++$i]->menu_item_parent == $childID) {
                                    $menuItemObjectGrandChild = $menuArray[$i];
                                    $grandChildID = $menuArray[$i]->ID;
                                    $subsubMenuArray[$x++] = [
                                        "id" => $grandChildID,
                                        "title" => $menuItemObjectGrandChild->title,
                                        "slug" => make_lowercase($menuItemObjectGrandChild->title),
                                        "url" => $menuItemObjectGrandChild->url
                                    ];
                                }
                                $i--;
                                $subMenuArray[$parentID][$j] = array_replace($subMenuArray[$parentID][$j], array("child" => true), array("childArray" => $subsubMenuArray)); 
	 						}
                             $j++;
	 					}
	 				}										
	 				echo "</li>";
                 }											
             } ?>
	 	</ul>
	 </nav>



<div id="sub-menu" class="header__sub-menu has-white-background-color">
    <div id="sub-menu-list" class="header__sub-menu-list">

    </div>
    <div id="sub-menu-posts" class="header__sub-menu-posts">

    </div>
</div>

<?php 
/*


foreach($subMenuArray as $key => $value) { ?>

    <div id="sub-menu-<?php echo $key ?>"class="header__sub-menu" title="<?php echo $parentArray[$key] ?>">
        <nav class="sub-menu">
    
        <ul class="sub-menu__list">
        <?php foreach($value as $key => $value) {
            $url = $value["url"];
            $title = $value["title"];
            $addClass = ($value["child"])?" sub-menu__item--has-children":"";
            echo "<li class='sub-menu__item$addClass'><a href='$url'>$title</a>";
            if($value["child"]) {
                $addClass = (count($value["childArray"]) > 3)?" subsub-menu__list--columns":"";
                echo "<ul class='subsub-menu__list$addClass'>";
                foreach($value["childArray"] as $key => $value) {
                    $url = $value["url"];
                    $title = $value["title"];
                    echo "<li class='subsub-menu__item'><a href='$url'>$title</a>";
                }
                echo "</ul>";
            }
            echo "</li>";
        } ?>
        </ul>

        </nav>

    </div>


?>



<!--- navigation --->