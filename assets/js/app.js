! function (a) {
	"use strict";
	a(".dropdown-menu a.dropdown-toggle").on("click", function (t) {
		return a(this).next().hasClass("show") || a(this).parents(".dropdown-menu").first().find(".show").removeClass("show"), a(this).next(".dropdown-menu").toggleClass("show"), !1
	}), a(function () {
		a('[data-toggle="tooltip"]').tooltip()
	}), a(function () {
		a('[data-toggle="popover"]').popover()
	})
}(jQuery);