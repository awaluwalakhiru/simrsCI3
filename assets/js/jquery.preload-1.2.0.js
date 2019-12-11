
(function ($) {
	$.fn.preload = function (options)  //initiate & name the function
	{
		// settings object
		var settings = $.extend(
			{
				// These are the defaults.
				loadingClass: '',
				loadedClass: '',
				progressFunction: null,
				onComplete: null,
				waitFirst: 100									// Delay before starting (because what if everything's loaded already?)
			}, options);


		//Tracking variables
		var ct = 0;
		var loadCount = this.length;
		var needToPresent = true;


		//do some stuff before looping through
		$("." + settings.loadedClass).css("display", "none");

		if (settings.loadingClass !== '') {
			$("." + settings.loadingClass).css("display", "none");
		}

		setTimeout(function () {
			if (needToPresent && settings.loadingClass !== '') {
				$("." + settings.loadingClass).css("display", "block");
			}
		}, settings.waitFirst);


		// load one by one
		this.each(function (index, element) {
			var img = new Image();
			img.src = $(element).attr('src');
			img.onload = loaded;
		});


		//When each element has loaded
		function loaded() {
			ct++;
			if (settings.progressFunction !== null) {
				settings.progressFunction(ct, loadCount);
			}
			if (ct >= loadCount) {
				console.log("done!");
				needToPresent = false;

				if (settings.onComplete === null) {
					// bring the loaded stuff & hide the loading class
					window.setTimeout(function () {
						if (settings.loadingClass !== '') {
							$("." + settings.loadingClass).fadeOut(200, function () { $("." + settings.loadedClass).fadeIn(200); });
						}
						else {
							$("." + settings.loadedClass).fadeIn(200);
						}

					}, 300);

				}
				else {
					settings.onComplete();
				}
			}
		}
	};


}(jQuery));

