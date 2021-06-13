class MegaMenu {
    // 1. Describe

    constructor() {
        this.apiRoute = "http://" + window.location.host + "/wp-json/glzr/v0/menu/header";
        this.mainMenuList = $(".menu__list");
        this.mainMenuItem = $(".mega-menu__item");
        this.menuToggle = $("#menu-toggle");
        this.menuItem = $(".mega-menu__item");
        this.events();
        this.currentPrimaryMenu;
        this.currentSecondaryMenu;
        this.currentItemNewsBlock;
        this.currentItem;
        this.currentTarget;
        this.currentMenuLevel=0;
    }

    // 2. Events
    events() {

        $("#body-wrapper").on("click", (e) => {
            $(".mega-menu__list--show").removeClass("mega-menu__list--show");
            $(".mega-menu__item--active").removeClass("mega-menu__item--active");
        })

        $(this.menuToggle).on("click", (e) => {
            $("#menu-primary").toggleClass("mega-menu__list--show");
            this.menuToggle.children().toggleClass("close");
        })

        $(this.menuItem).on("click", (e) => {

            this.currentTarget = e.currentTarget;
            this.targetParent = e.currentTarget.parentNode;

            if (this.targetParent.getAttribute("data-menu-level") == 0) {
                $(".mega-menu__list--show").removeClass("mega-menu__list--show");
                $("#" + this.currentSecondaryMenu).removeClass("mega-menu__item--active");
                if (this.targetParent.id != this.currentPrimaryMenu) {
                    $("#" + this.currentPrimaryMenu).removeClass("mega-menu__item--active");
                }
                this.currentTarget.parentNode.after(document.querySelector("[data-menu-parent='" + this.currentTarget.id + "']"));
                document.querySelector("[data-menu-parent='" + this.currentTarget.id + "']").classList.add("mega-menu__list--show");
                // document.querySelector("[data-menu-parent='" + this.currentTarget.id + "']").after(document.querySelector("[data-menu-parent='" + this.currentTarget.id + "']").querySelector('[data-post-type="category"] ul'));
                this.currentItemNewsBlock = document.querySelector("[data-menu-parent='" + this.currentTarget.id + "']").querySelector('[data-post-type="category"]').id;
                document.querySelector("[data-menu-parent='" + this.currentTarget.id + "']").after(document.querySelector("[data-menu-parent='" + this.currentItemNewsBlock + "']"));
                document.querySelector("[data-menu-parent='" + this.currentItemNewsBlock + "']").classList.add("mega-menu__list--show");


                this.currentPrimaryMenu = this.currentTarget.id;
            }

            else if (this.targetParent.getAttribute("data-menu-level") == 1) {
                if (this.targetParent.id != this.currentSecondaryMenu) {
                    $("#" + this.currentSecondaryMenu).removeClass("mega-menu__item--active");
                    console.log(this.currentSecondaryMenu);
                    // $("#" + this.currentSecondaryMenu).appendChild($("[data-menu-parent=" + this.currentSecondaryMenu + "]"))
                    $("[data-menu-parent=" + this.currentSecondaryMenu + "]").removeClass("mega-menu__list--show");
                }
                this.currentTarget.parentNode.after(document.querySelector("[data-menu-parent='" + this.currentTarget.id + "']"));
                document.querySelector("[data-menu-parent='" + this.currentTarget.id + "']").classList.add("mega-menu__list--show");
                this.currentSecondaryMenu = this.currentTarget.id;
            }

             this.currentTarget.classList.add("mega-menu__item--active");

            })


    }


}

export default MegaMenu;