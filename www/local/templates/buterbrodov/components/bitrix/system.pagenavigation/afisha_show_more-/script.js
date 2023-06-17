function ajaxLoadingItems(loadMoreBtn) {

	const ajaxContainer = document.querySelector(".ajax-container");
	const ajaxItems = ajaxContainer.querySelector(".ajax-items");
	const loadMoreBtnContainer = ajaxContainer.querySelector(".load-more-container");
	var loadMoreUrl = loadMoreBtn.getAttribute("data-url");

	var ajaxUrl = "/local/ajax/afisha.news.list.php"+loadMoreUrl;

	ajaxContainer.classList.add("loading");

	if (loadMoreUrl) {
		//setTimeout(function() {

			BX.ajax({
				url: ajaxUrl,
				data: {"pager_tpl":"afisha_show_more"},
				method: 'GET',
				dataType: 'html',
				timeout: 30,
				async: true,
				processData: true,
				scriptsRunFirst: false,
				emulateOnload: true,
				start: true,
				cache: false,
				onsuccess: function(data){
					loadMoreBtn.remove();
	
					var tempDiv = document.createElement("div");
					tempDiv.innerHTML = data;
	
					var loadedItems = tempDiv.querySelectorAll(".ajax-item");
	
					Array.prototype.forEach.call(loadedItems, function (loadedItem) {
						ajaxItems.append(loadedItem);

					});
	
					var loadedloadMoreBtn = tempDiv.querySelector(".load-more");
	
					if(loadedloadMoreBtn)
					{
						loadMoreBtnContainer.append(loadedloadMoreBtn);

						loadedloadMoreBtn.addEventListener("click", function () {
							ajaxLoadingItems(this);
						});
					}

					ajaxContainer.classList.remove("loading");

					popoversAjax();

				},

				onfailure: function(){
				
				}
			}); 

		//}, 1000);

	}
}



var loadMoreBtn = document.querySelector(".load-more");
const ajaxContainer = document.querySelector(".ajax-container");

if(loadMoreBtn) {

	if (window.frameCacheVars !== undefined) {
		BX.addCustomEvent("onFrameDataReceived", function (json) {
			loadMoreBtn.addEventListener("click", function () {
				ajaxLoadingItems(this);
			});
		});
	}
	else {
		BX.ready(function () {
			loadMoreBtn.addEventListener("click", function () {
				ajaxLoadingItems(this);
			});
		});
	}
}



function popoversAjax() {
	var popoverPlaceholder = document.querySelector(".popover-placeholder");
	if(popoverPlaceholder)
	{
		Array.prototype.forEach.call(document.querySelectorAll('[data-popover]'), (popover_btn) => {
			var popover = document.getElementById(popover_btn.getAttribute('data-popover'));
			if(popover)
			{
				var popover_btn_close = popover.querySelector(".popover-close");
				document.querySelector(".popover-placeholder").append(popover);
				popoverHide(popover);
				popover_btn.addEventListener("click", function () {
					popoverShow(popover);
					popoverPos(popover, popover_btn);
				});
				popover_btn_close.addEventListener("click", function () {
					popoverHide(popover);
				});
				window.addEventListener('resize', function (event) {
					popoverPos(popover, popover_btn);
				});
			}
		});
	}

    function popoverShow(popover) {
        popover.classList.add("active");
    }

    function popoverHide(popover) {
        popover.classList.remove("active");
        popover.setAttribute("style", '');
    }

    function popoverPos(popover, popover_btn) {
        var popoverBtnRect = popover_btn.getBoundingClientRect();
        var bodyRect = document.querySelector("body").getBoundingClientRect();
        var margin = 20;
        var top = popoverBtnRect.top - bodyRect.top + "px";
        var left = popoverBtnRect.left - bodyRect.left - 10 + "px";
        var right = "auto";
        var bottom = "auto";
        var position = "top:" + top + ";left:" + left + ";right:" + right + ";bottom:" + bottom + ";"
        popover.setAttribute("style", position);
        var popoverRect = popover.getBoundingClientRect();
        if ((popoverRect.x + popoverRect.width) < 0) {
            left = margin + "px";
            right = "auto";
        }
        if (popoverRect.x > window.innerWidth || (popoverRect.x + popoverRect.width) > (window.innerWidth) - 17) {
            right = margin + "px";
            left = "auto";
        }
        var position = "top:" + top + ";left:" + left + ";right:" + right + ";bottom:" + bottom + ";"
        popover.setAttribute("style", position);
    }

}


