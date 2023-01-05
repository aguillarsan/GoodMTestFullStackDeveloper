"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[423],{3538:(t,s,e)=>{e.r(s),e.d(s,{default:()=>o});const a={components:{"v-skeleton-store":e(97).Z},data:function(){return{products_shopping_cart:[],config_skeleton:{col:"col-lg-12",load:!0},orderLoad:!1}},created:function(){this.getProductsShoppingCart()},computed:{totalPriceWithDiscount:function(){var t=0;return this.products_shopping_cart.reduce((function(s,e){t+=e.total_product*(e.product.price-Math.round(e.product.price*e.product.discount/100))}),0),t},totalSavings:function(){var t=0;return this.products_shopping_cart.reduce((function(s,e){t+=e.total_product*Math.round(e.product.price*e.product.discount/100)}),0),t}},methods:{getProductsShoppingCart:function(){var t=this;axios.get("/api/shopping-cart",{params:{store_id:this.$route.params.store_id}}).then((function(s){t.products_shopping_cart=s.data.product_shopping_cart,t.config_skeleton.load=!1}))},totalPriceProduct:function(t){var s=t.product.price,e=t.product.discount,a=t.total_product;return(s-Math.round(s*e/100))*a},storeOrder:function(){var t=this;this.orderLoad=!0;var s=new FormData;s.append("store_id",this.$route.params.store_id),s.append("delivery_type_id",1),s.append("total_amount",this.totalPriceWithDiscount),axios.post("/api/orders",s).then((function(s){var e=s.data.orderNumber;t.storeOrderProducts(e)})).catch((function(t){alert(t.message)}))},storeOrderProducts:function(t){var s=this,e=new FormData;console.log(t),e.append("store_id",this.$route.params.store_id),e.append("order_id",t),axios.post("/api/order-products",e).then((function(e){s.$router.push("/order/"+t),s.orderLoad=!1})).catch((function(t){alert(t.message)}))}}};const o=(0,e(1900).Z)(a,(function(){var t=this,s=t._self._c;return s("div",[s("div",{staticClass:"appHeader-app text-light d-flex"},[s("div",{staticClass:"left"},[s("a",{staticClass:"headerButton goBack",attrs:{href:"#"},on:{click:function(s){return s.preventDefault(),t.$router.go(-1)}}},[s("i",{staticClass:"uil uil-angle-left-b md hydrated"})])]),t._v(" "),s("div",{staticClass:"pageTitle text-dark"},[t._v("Carrito de compras")]),t._v(" "),s("div",{staticClass:"right"})]),t._v(" "),s("div",{staticClass:"d-flex flex-column flex-column-fluid"},[s("div",{staticClass:"app-content flex-column-fluid"},[s("div",{staticClass:"app-container container-xxl mt-10 mb-60 no-mt"},[t._m(0),t._v(" "),s("v-skeleton-store",{attrs:{config_skeleton:t.config_skeleton}}),t._v(" "),t._l(t.products_shopping_cart,(function(e,a){return s("div",{staticClass:"p-4 mt-5 w-100 d-flex justify-content-between align-items-center mb-5 card card-shopping-cart"},[s("div",{staticClass:"w-100 d-flex justify-content-between align-items-center"},[s("div",{staticClass:"d-flex"},[s("img",{staticClass:"image-product",attrs:{src:e.product.image,width:"100"}}),t._v(" "),s("div",{staticClass:"display-grid m-l-05 p-3"},[s("span",[t._v(t._s(e.total_product)+" x $"+t._s(t._f("moneyFormat")(t._f("calculateDiscount")(e.product))))]),t._v(" "),s("span",[t._v(" "+t._s(e.product.name))])])]),t._v(" "),s("div",{},[s("span",{staticClass:"fs-w-500 text-primary"},[t._v(t._s(t._f("moneyFormat")(t.totalPriceProduct(e))))])])])])})),t._v(" "),s("div",{staticClass:"w-100 d-flex justify-content-between align-items-center mb-5"},[t._m(1),t._v(" "),s("div",{staticClass:"display-grid"},[s("span",{staticClass:"fs-w-300 text-muted"},[t._v("-$"+t._s(t._f("moneyFormat")(t.totalSavings)))]),t._v(" "),s("span",{staticClass:"fs-w-600 text-primary"},[t._v("$"+t._s(t._f("moneyFormat")(t.totalPriceWithDiscount)))])])]),t._v(" "),s("div",{staticClass:"d-flex justify-content-center align-items-center w-100"},[s("button",{staticClass:"btn btn-primary w-30 btn-rounded btn-lg hidden-button",attrs:{disabled:!!t.orderLoad,type:"button"},on:{click:t.storeOrder}},[s("span",{directives:[{name:"show",rawName:"v-show",value:!t.orderLoad,expression:"!orderLoad"}]},[t._v("Pagar")]),t._v(" "),s("div",{directives:[{name:"show",rawName:"v-show",value:t.orderLoad,expression:"orderLoad"}],staticClass:"spinner-border text-secondary",attrs:{role:"status"}})])])],2)])]),t._v(" "),s("div",{staticClass:"appBottomMenu type-buttom"},[s("div",{staticClass:"item p-5"},[s("div",{staticClass:"col"},[s("button",{staticClass:"btn btn-primary w-100 btn-rounded btn-lg",attrs:{disabled:!!t.orderLoad},on:{click:t.storeOrder}},[s("span",{directives:[{name:"show",rawName:"v-show",value:!t.orderLoad,expression:"!orderLoad"}]},[t._v("Pagar")]),t._v(" "),s("div",{directives:[{name:"show",rawName:"v-show",value:t.orderLoad,expression:"orderLoad"}],staticClass:"spinner-border text-secondary",attrs:{role:"status"}})])])])])])}),[function(){var t=this._self._c;return t("div",{staticClass:"d-flex justify-content-between align-items-center mb-4",attrs:{id:"order_detail"}},[t("div",{staticClass:"d-flex align-items-center justify-content-center"},[t("span",{staticClass:"fs-w-500 fs-4"},[this._v("Carrito de compras")])])])},function(){var t=this,s=t._self._c;return s("div",{staticClass:"display-grid"},[s("span",{staticClass:"fs-w-300 text-dark"},[t._v("Ahorro")]),t._v(" "),s("span",{staticClass:"fs-w-600 text-primary"},[t._v("Total a pagar")])])}],!1,null,null,null).exports},97:(t,s,e)=>{e.d(s,{Z:()=>o});const a={props:["config_skeleton"]};const o=(0,e(1900).Z)(a,(function(){var t=this,s=t._self._c;return s("div",{directives:[{name:"show",rawName:"v-show",value:t.config_skeleton.load,expression:"config_skeleton.load"}],staticClass:"row"},t._l(3,(function(e){return s("div",{staticClass:"col-lg-4 mb-4",class:t.config_skeleton.col?t.config_skeleton.col:""},[t._m(0,!0)])})),0)}),[function(){var t=this,s=t._self._c;return s("div",{staticClass:"card card-store"},[s("div",{staticClass:"store-image mb-3"},[s("div",{staticClass:"store-container"},[s("div",{staticClass:"store-detail w-100"},[s("span",{staticClass:"skeleton skeleton-text w-50"}),t._v(" "),s("span",{staticClass:"skeleton skeleton-text w-30"})]),t._v(" "),s("div",{staticClass:"store-like"})])]),t._v(" "),s("div",{staticClass:"store-logo"},[s("div",{staticClass:"logo"},[s("span",{staticClass:"sekeleton sekeleton-image"})])]),t._v(" "),s("div",{staticClass:"store-footer"},[s("div",{staticClass:"store-footer-detail mb-2"},[s("div",{staticClass:"store-detail w-100"},[s("span",{staticClass:"skeleton skeleton-text w-80"}),t._v(" "),s("span",{staticClass:"skeleton skeleton-text w-80"})]),t._v(" "),s("div",{staticClass:"store-detail w-100"},[s("span",{staticClass:"skeleton skeleton-text w-80"})])])])])}],!1,null,null,null).exports}}]);