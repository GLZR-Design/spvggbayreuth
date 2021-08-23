
import {NAVBAR as breakpointNavbar} from "./Breakpoints";


class MegaMenu {
    // 1. Describe

    constructor() {
        this.apiRoute = "http://" + window.location.host + "/wp-json/glzr/v0/menu/header";
        this.mainMenuList = $(".menu__list");
        this.mainMenuItem = $(".mega-menu__item");
        this.menuToggle = $("#menu-toggle");
        this.menuItem = $(".mega-menu__item");
        this.menuPrimary = $("#menu-primary")[0];
        this.mobileMenuBack = $("#menu-back");

        this.checkOnMobile();
        this.events();
        this.currentPrimaryMenu;
        this.currentSecondaryMenu;
        this.currentItemNewsBlock;
        this.currentItem;
        this.currentTarget;
        this.currentMenuLevel=0;
        this.mobileMenuShown = false;
        this.previousMobileMenu;
        this.currentMobileMenu;

    }

    // 2. Events
    events() {

        window.addEventListener('resize', this.checkOnMobile);
        this.checkOnMobile();

        if (this.onMobile) {
            $(this.menuToggle).on("click", (e) => {
                console.log(this.onMobile);
                    if (this.mobileMenuShown) {
                        $(".mega-menu__list--show").removeClass("mega-menu__list--show");
                        document.getElementById("menu-back").style.display = "none";
                        this.mobileMenuShown = false;
                    }
                    else {
                        $("#menu-primary").addClass("mega-menu__list--show");
                        this.mobileMenuShown = true
                    }
                    this.menuToggle.children().toggleClass("close");
            })

            $(this.menuItem).on("click", (e) => {
                document.getElementById("menu-back").style.display = "block";
                this.currentMobileMenu = document.querySelector("[data-menu-parent='" + e.currentTarget.id + "']");
                this.previousMobileMenu = e.currentTarget.parentNode;
                this.currentMobileMenu.classList.add("mega-menu__list--show");
                this.previousMobileMenu.classList.remove("mega-menu__list--show");
            })

            $(this.mobileMenuBack).on("click", (e) => {
                this.currentMobileMenu.classList.remove("mega-menu__list--show");

                if (this.currentMobileMenu.getAttribute('data-menu-level') == 1) {
                    e.currentTarget.style.display = "none";
                    this.previousMobileMenu = this.menuPrimary;
                }
                    console.log(this.previousMobileMenu);

                this.previousMobileMenu.classList.add("mega-menu__list--show");
                this.currentMobileMenu = this.previousMobileMenu;


            })
        }


        $("#body-wrapper").on("click", (e) => {
            $(".mega-menu__list--show").removeClass("mega-menu__list--show");
            $(".mega-menu__item--active").removeClass("mega-menu__item--active");
        })


        $(this.menuItem).on("click", (e) => {

            console.log("TEST");
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


    checkOnMobile() {
        if (window.matchMedia(`(max-width: ${breakpointNavbar})`).matches) {
            this.onMobile = true;
        }
        else {
            this.mobile = false;
        }
    }

}

export default MegaMenu;