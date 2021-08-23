class SportspressEventList {

    constructor() {
        this.namespace = 'sp-block-event-list'
        this.showEventLinksButton = $('.' + this.namespace + '__button--show');
        this.hideEventLinksButton = $('.' + this.namespace + '__button--hide');
        this.linksShown = false;
        this.currentLinks = null;
        this.events();
    }

    events() {


        this.showEventLinksButton.each((e, element) => {
            element.addEventListener('click', (e) => {
                if (this.linksShown) {
                    this.currentLinks.classList.toggle(this.namespace + '__links--show');
                }
                this.currentLinks = e.currentTarget.nextSibling;
                this.currentLinks.classList.toggle(this.namespace + '__links--show');
                this.linksShown = true;
            })
        })

        this.hideEventLinksButton.each((e, element) => {
            element.addEventListener('click', (e) => {
                this.currentLinks.classList.toggle(this.namespace + '__links--show');
                this.currentLinks = null;
                this.linksShown = false;
            })
        })


    }

    showLinks() {
        if (!this.linksShown) {
            this.currentLinks.classList.toggle(this.namespace + '__links--show');
        }
        else {

        }
    }

}



export default SportspressEventList;