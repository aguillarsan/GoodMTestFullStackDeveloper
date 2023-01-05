"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[582],{8777:(s,t,a)=>{a.r(t),a.d(t,{default:()=>r});var e=a(1900);const i={components:{"v-order-detail-skeleton":(0,e.Z)({},(function(){var s=this,t=s._self._c;return t("div",{staticClass:"row justify-content-center mt-5"},[t("div",{staticClass:"col-lg-6 mb-4"},[t("div",{staticClass:"card card-order p-25"},[t("div",{staticClass:"order-container"},[s._m(0),s._v(" "),t("div",{staticClass:"order-body mt-8 d-flex"},[t("div",{staticClass:"order-detail w-100"},[t("div",{staticClass:"display-grid"},[s._m(1),s._v(" "),s._l(4,(function(s,a){return t("div",{staticClass:"fs-5 fs-w-400 display-grid"},[t("span",{staticClass:"skeleton skeleton-text w-40"})])})),s._v(" "),t("div",{staticClass:"separator"}),s._v(" "),s._m(2),s._v(" "),s._m(3),s._v(" "),t("div",{staticClass:"separator"}),s._v(" "),s._m(4),s._v(" "),s._m(5)],2)])])])])])])}),[function(){var s=this._self._c;return s("div",{staticClass:"order-header"},[s("div",{staticClass:"ribbon-order ribbon-label"},[this._v("Rescatada")])])},function(){var s=this._self._c;return s("h2",{staticClass:"display-grid"},[s("span",{staticClass:"skeleton skeleton-text w-60"})])},function(){var s=this._self._c;return s("h5",{staticClass:"fs-5 display-grid w-100"},[s("span",{staticClass:"skeleton skeleton-text w-30"})])},function(){var s=this._self._c;return s("div",{staticClass:"fs-5 fs-w-400 display-grid"},[s("span",{staticClass:"skeleton skeleton-text w-100"})])},function(){var s=this._self._c;return s("div",{staticClass:"fs-5 fs-w-400 display-grid"},[s("span",{staticClass:"skeleton skeleton-text w-100"})])},function(){var s=this._self._c;return s("div",{staticClass:"fs-5 fs-w-400 display-grid"},[s("span",{staticClass:"skeleton skeleton-text w-100"})])}],!1,null,null,null).exports},data:function(){return{load:!0,order:[]}},created:function(){this.getOrderDetail()},methods:{getOrderDetail:function(){var s=this;axios.get("/api/orders/"+this.$route.params.order_id).then((function(t){return t.data.order?(s.order=t.data.order,void(s.load=!1)):s.$eventBus.$emit("alert.toast.event",t.data.code,t.data.message)})).catch((function(s){alert(s.message)}))}}};const r=(0,e.Z)(i,(function(){var s=this,t=s._self._c;return t("div",[t("div",{staticClass:"appHeader-app text-light d-flex"},[t("div",{staticClass:"left"},[t("router-link",{staticClass:"headerButton goBack",attrs:{to:"/orders"}},[t("i",{staticClass:"uil uil-angle-left-b md hydrated"})])],1),s._v(" "),t("div",{staticClass:"pageTitle text-dark"},[s._v("Detalle de la orden")]),s._v(" "),t("div",{staticClass:"right"})]),s._v(" "),t("div",{staticClass:"d-flex flex-column flex-column-fluid"},[t("div",{staticClass:"app-content flex-column-fluid"},[t("div",{staticClass:"app-container container-xxl mt-10 mb-60 no-mt"},[s._m(0),s._v(" "),s.load?t("v-order-detail-skeleton"):s._e(),s._v(" "),s.load?s._e():t("div",{staticClass:"row justify-content-center mt-5"},[t("div",{staticClass:"col-lg-6 mb-4"},[t("div",{staticClass:"card card-order p-25"},[t("div",{staticClass:"order-container"},[s._m(1),s._v(" "),t("div",{staticClass:"order-body mt-8 d-flex"},[t("div",{staticClass:"order-detail w-100"},[t("div",{staticClass:"display-grid"},[t("h2",[s._v(s._s(s.order.store.name))]),s._v(" "),t("div",{staticClass:"fs-5 fs-w-400"},[s._v("Dirección: "+s._s(s.order.store.direction))]),s._v(" "),t("div",{staticClass:"fs-5 fs-w-400"},[s._v("Horario de retiro:\n                                                "+s._s(s.order.store.opening_hours)+" a\n                                                "+s._s(s.order.store.closing_time))]),s._v(" "),t("div",{staticClass:"fs-5 fs-w-400"},[s._v("Fecha de retiro: 25/06/2022")]),s._v(" "),t("div",{staticClass:"fs-5 fs-w-400"},[s._v("Nro° orden: "+s._s(s.order.id))]),s._v(" "),t("div",{staticClass:"separator"}),s._v(" "),t("h5",{staticClass:"fs-5"},[s._v("Productos")]),s._v(" "),s._l(s.order.products,(function(a,e){return t("div",{staticClass:"d-flex align-items-center justify-content-between mb-2"},[t("div",{staticClass:"fs-5 fs-w-400"},[s._v("1")]),s._v(" "),t("div",{staticClass:"fs-5 fs-w-400"},[s._v(s._s(a.name))]),s._v(" "),t("div",{staticClass:"fs-5 fs-w-400"},[s._v("$"+s._s(s._f("moneyFormat")(s._f("calculateDiscount")(a))))])])})),s._v(" "),t("div",{staticClass:"separator"}),s._v(" "),s._m(2),s._v(" "),t("div",{staticClass:"d-flex align-items-center justify-content-between"},[t("div",{staticClass:"fs-5 fs-w-600"},[s._v("Monto Total")]),s._v(" "),t("div",{staticClass:"fs-5 fs-w-600 mt-3"},[s._v("$"+s._s(s._f("moneyFormat")(s.order.total_amount)))])])],2)])])])])])])],1)])])])}),[function(){var s=this._self._c;return s("div",{staticClass:"d-flex justify-content-between align-items-center mb-4",attrs:{id:"order_detail"}},[s("div",{staticClass:"d-flex align-items-center justify-content-center"},[s("span",{staticClass:"fs-w-500 fs-4"},[this._v("Detalle de la orden")])])])},function(){var s=this._self._c;return s("div",{staticClass:"order-header"},[s("div",{staticClass:"ribbon-order ribbon-label"},[this._v("Rescatada")])])},function(){var s=this,t=s._self._c;return t("div",{staticClass:"d-flex align-items-center justify-content-between"},[t("div",{staticClass:"fs-5 fs-w-400"},[s._v("Delivery")]),s._v(" "),t("div",{staticClass:"fs-5 fs-w-400"},[s._v("$3.500")])])}],!1,null,null,null).exports}}]);