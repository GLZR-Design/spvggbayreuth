class PostFilter {

    constructor() {
        this.submitButton = $("#filter-submit");
        this.filterForm = $("#filter");
        this.posttypeSelector = $("#posttype");
        this.orderBySelector = $("#order");
        this.dateSelector = $("#date");
        this.categoryFilters = $(".post-filter__categories label");
        this.filterTimer;
        this.events();

    }

    events() {

        $(this.posttypeSelector.on("change", e => {
            $(this.submitButton).click();
        }))
       $(this.orderBySelector.on("change", e => {
            $(this.submitButton).click();
        }))
       $(this.dateSelector.on("change", e => {
           $(this.submitButton).click();
        }))

        $(this.categoryFilters.on("click", this.applyFilter ))

        jQuery(function($){
            $('#filter').submit(function(){
                var filter = $('#filter');
                $.ajax({
                    url:filter.attr('action'),
                    data:filter.serialize(), // form data
                    type:filter.attr('method'), // POST
                    beforeSend:function(xhr){
                        filter.find('button').text('Processing...'); // changing the button label
                        $('#response').html("<div className='spinner'></div>"); // insert data
                    },
                    success: function(data){
                        filter.find('button').text('Apply filter'); // changing the button label back
                        $('#response').html(data) // insert data
                    }
                });
                return false;
            });
        });

    }

    applyFilter() {

        this.filterTimer = setTimeout(() => {
            $("#filter-submit").click();
        }, 700)

        // $(this.submitButton).click()

    }



}
export default PostFilter;