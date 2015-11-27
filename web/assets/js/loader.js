var Loader = {
    $container: $('body'),
    template: function(){
        return $('<div class="overlay">'+
                    '<div class="sk-folding-cube">' +
                        '<div class="sk-cube1 sk-cube"></div>' +
                        '<div class="sk-cube2 sk-cube"></div>' +
                        '<div class="sk-cube4 sk-cube"></div>' +
                        '<div class="sk-cube3 sk-cube"></div>' +
                    '</div>' +
            '</div>');
    }(),

    startLoader: function(){
        this.$container.append(this.template);
    },

    stopLoader: function(){
        this.$container.find(this.template).remove();
    }
};
