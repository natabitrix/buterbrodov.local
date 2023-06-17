function ajaxLoadingItems(loadMoreBtn) {

	const ajaxContainer = document.querySelector(".ajax-container");
	const ajaxItems = ajaxContainer.querySelector(".ajax-items");
	const loadMoreBtnContainer = ajaxContainer.querySelector(".load-more-container");
	var loadMoreUrl = loadMoreBtn.getAttribute("data-url");

	ajaxContainer.classList.add("loading");

	if (loadMoreUrl) {

		BX.ajax({
			url: loadMoreUrl,
			data: {},
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

				var ajaxContent = data.split('<!--ajax_content-->')[1];

				var tempDiv = document.createElement("div");
				tempDiv.innerHTML = ajaxContent;

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

			},
			onfailure: function(){
			
			}
		}); 
	}
}

var loadMoreBtn = document.querySelector(".load-more");

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