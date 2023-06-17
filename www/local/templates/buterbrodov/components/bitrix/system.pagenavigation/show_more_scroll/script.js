
function isScrolledIntoView(container)
{
	var docViewTop = document.documentElement.scrollTop;
	var docViewBottom = docViewTop + document.documentElement.clientHeight;

	var containerTop = container.offsetTop;
	var containerBottom = containerTop + container.getBoundingClientRect().height;

	return (docViewBottom >= containerBottom);
}

function attachPagination(loadMoreBtn, ajaxContainer)
{
	loadMoreBtn.style.display = "none";
	var busy = false;
	addEventListener('scroll', (event) => {
		if(isScrolledIntoView(ajaxContainer) && !busy) {
			busy = true;
			loadMoreBtn.click();
		}
	});
}


function ajaxLoadingItems(loadMoreBtn) {

	const ajaxContainer = document.querySelector(".ajax-container");
	const ajaxItems = ajaxContainer.querySelector(".ajax-items");
	const loadMoreBtnContainer = ajaxContainer.querySelector(".load-more-container");
	var loadMoreUrl = loadMoreBtn.getAttribute("data-url");
	ajaxContainer.classList.add("loading");

	if (loadMoreUrl) {
		//setTimeout(function() {
			BX.ajax({
				// url: ajaxUrl,
				url: loadMoreUrl + "&IS_AJAX=Y",
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
	
					var tempDiv = document.createElement("div");
					tempDiv.innerHTML = data;
	
					var loadedItems = tempDiv.querySelectorAll(".ajax-item");
					
	
					Array.prototype.forEach.call(loadedItems, function (loadedItem) {
						loadedItem.classList.add("loaded");
						ajaxItems.append(loadedItem);
						
					});
	
					
					var loadedloadMoreBtn = tempDiv.querySelector(".load-more");
	
					if(loadedloadMoreBtn)
					{
						loadMoreBtnContainer.append(loadedloadMoreBtn);
	
						attachPagination(loadedloadMoreBtn, ajaxContainer);
	
						loadedloadMoreBtn.addEventListener("click", function () {
							ajaxLoadingItems(this);
						});
					}
					else{
						//для корректного фиксирования сайдбаров
						document.querySelector("body").classList.add("ajax-items-loaded-all");
					}

					// popoversAjax();

					ajaxContainer.classList.remove("loading");

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
			attachPagination(loadMoreBtn, ajaxContainer);
			loadMoreBtn.addEventListener("click", function () {
				ajaxLoadingItems(this);
			});
		});
	}
	else {
		BX.ready(function () {
			attachPagination(loadMoreBtn, ajaxContainer);
			loadMoreBtn.addEventListener("click", function () {
				ajaxLoadingItems(this);
			});
		});
	}
}

