"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["chunks/orders/orderDetail"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/orderDetail.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/orderDetail.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _skeleton_skeletonOrderDetail_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../skeleton/skeletonOrderDetail.vue */ "./resources/js/components/skeleton/skeletonOrderDetail.vue");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    'v-order-detail-skeleton': _skeleton_skeletonOrderDetail_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      load: true,
      order: []
    };
  },
  created: function created() {
    this.getOrderDetail();
  },
  methods: {
    getOrderDetail: function getOrderDetail() {
      var _this = this;
      axios.get('/api/orders/' + this.$route.params.order_id).then(function (response) {
        _this.order = response.data.order;
        _this.load = false;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/orderDetail.vue?vue&type=template&id=647a9420&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/orderDetail.vue?vue&type=template&id=647a9420& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", [_c("div", {
    staticClass: "appHeader-app text-light d-flex"
  }, [_c("div", {
    staticClass: "left"
  }, [_c("a", {
    staticClass: "headerButton goBack",
    attrs: {
      href: "#"
    },
    on: {
      click: function click($event) {
        $event.preventDefault();
        return _vm.$router.go(-1);
      }
    }
  }, [_c("i", {
    staticClass: "uil uil-angle-left-b md hydrated"
  })])]), _vm._v(" "), _c("div", {
    staticClass: "pageTitle text-dark"
  }, [_vm._v("Detalle de la orden")]), _vm._v(" "), _c("div", {
    staticClass: "right"
  })]), _vm._v(" "), _c("div", {
    staticClass: "d-flex flex-column flex-column-fluid"
  }, [_c("div", {
    staticClass: "app-content flex-column-fluid"
  }, [_c("div", {
    staticClass: "app-container container-xxl mt-10 mb-60 no-mt"
  }, [_vm._m(0), _vm._v(" "), _vm.load ? _c("v-order-detail-skeleton") : _vm._e(), _vm._v(" "), !_vm.load ? _c("div", {
    staticClass: "row justify-content-center mt-5"
  }, [_c("div", {
    staticClass: "col-lg-6 mb-4"
  }, [_c("div", {
    staticClass: "card card-order p-25"
  }, [_c("div", {
    staticClass: "order-container"
  }, [_vm._m(1), _vm._v(" "), _c("div", {
    staticClass: "order-body mt-8 d-flex"
  }, [_c("div", {
    staticClass: "order-detail w-100"
  }, [_c("div", {
    staticClass: "display-grid"
  }, [_c("h2", [_vm._v(_vm._s(_vm.order.store.name))]), _vm._v(" "), _c("div", {
    staticClass: "fs-5 fs-w-400"
  }, [_vm._v("Dirección: " + _vm._s(_vm.order.store.direction))]), _vm._v(" "), _c("div", {
    staticClass: "fs-5 fs-w-400"
  }, [_vm._v("Horario de retiro:  " + _vm._s(_vm.order.store.opening_hours) + " a\n                                                " + _vm._s(_vm.order.store.closing_time))]), _vm._v(" "), _c("div", {
    staticClass: "fs-5 fs-w-400"
  }, [_vm._v("Fecha de retiro: 25/06/2022")]), _vm._v(" "), _c("div", {
    staticClass: "fs-5 fs-w-400"
  }, [_vm._v("Nro° orden: " + _vm._s(_vm.order.id))]), _vm._v(" "), _c("div", {
    staticClass: "separator"
  }), _vm._v(" "), _c("h5", {
    staticClass: "fs-5"
  }, [_vm._v("Productos")]), _vm._v(" "), _vm._l(_vm.order.products, function (product, index) {
    return _c("div", {
      staticClass: "d-flex align-items-center justify-content-between mb-2"
    }, [_c("div", {
      staticClass: "fs-5 fs-w-400"
    }, [_vm._v("1")]), _vm._v(" "), _c("div", {
      staticClass: "fs-5 fs-w-400"
    }, [_vm._v(_vm._s(product.name))]), _vm._v(" "), _c("div", {
      staticClass: "fs-5 fs-w-400"
    }, [_vm._v("$" + _vm._s(_vm._f("moneyFormat")(_vm._f("calculateDiscount")(product))))])]);
  }), _vm._v(" "), _c("div", {
    staticClass: "separator"
  }), _vm._v(" "), _vm._m(2), _vm._v(" "), _c("div", {
    staticClass: "d-flex align-items-center justify-content-between"
  }, [_c("div", {
    staticClass: "fs-5 fs-w-600"
  }, [_vm._v("Monto Total")]), _vm._v(" "), _c("div", {
    staticClass: "fs-5 fs-w-600 mt-3"
  }, [_vm._v("$" + _vm._s(_vm._f("moneyFormat")(_vm.order.total_amount)))])])], 2)])])])])])]) : _vm._e()], 1)])])]);
};
var staticRenderFns = [function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "d-flex justify-content-between align-items-center mb-4",
    attrs: {
      id: "order_detail"
    }
  }, [_c("div", {
    staticClass: "d-flex align-items-center justify-content-center"
  }, [_c("span", {
    staticClass: "fs-w-500 fs-4"
  }, [_vm._v("Detalle de la orden")])])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "order-header"
  }, [_c("div", {
    staticClass: "ribbon-order ribbon-label"
  }, [_vm._v("Rescatada")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "d-flex align-items-center justify-content-between"
  }, [_c("div", {
    staticClass: "fs-5 fs-w-400"
  }, [_vm._v("Delivery")]), _vm._v(" "), _c("div", {
    staticClass: "fs-5 fs-w-400"
  }, [_vm._v("$3.500")])]);
}];
render._withStripped = true;


/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/skeleton/skeletonOrderDetail.vue?vue&type=template&id=4ca0e3bb&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/skeleton/skeletonOrderDetail.vue?vue&type=template&id=4ca0e3bb& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "row justify-content-center mt-5"
  }, [_c("div", {
    staticClass: "col-lg-6 mb-4"
  }, [_c("div", {
    staticClass: "card card-order p-25"
  }, [_c("div", {
    staticClass: "order-container"
  }, [_vm._m(0), _vm._v(" "), _c("div", {
    staticClass: "order-body mt-8 d-flex"
  }, [_c("div", {
    staticClass: "order-detail w-100"
  }, [_c("div", {
    staticClass: "display-grid"
  }, [_vm._m(1), _vm._v(" "), _vm._l(4, function (h, index) {
    return _c("div", {
      staticClass: "fs-5 fs-w-400 display-grid"
    }, [_c("span", {
      staticClass: "skeleton skeleton-text w-40"
    })]);
  }), _vm._v(" "), _c("div", {
    staticClass: "separator"
  }), _vm._v(" "), _vm._m(2), _vm._v(" "), _vm._m(3), _vm._v(" "), _c("div", {
    staticClass: "separator"
  }), _vm._v(" "), _vm._m(4), _vm._v(" "), _vm._m(5)], 2)])])])])])]);
};
var staticRenderFns = [function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "order-header"
  }, [_c("div", {
    staticClass: "ribbon-order ribbon-label"
  }, [_vm._v("Rescatada")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("h2", {
    staticClass: "display-grid"
  }, [_c("span", {
    staticClass: "skeleton skeleton-text w-60"
  })]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("h5", {
    staticClass: "fs-5 display-grid w-100"
  }, [_c("span", {
    staticClass: "skeleton skeleton-text w-30"
  })]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "fs-5 fs-w-400 display-grid"
  }, [_c("span", {
    staticClass: "skeleton skeleton-text w-100"
  })]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "fs-5 fs-w-400 display-grid"
  }, [_c("span", {
    staticClass: "skeleton skeleton-text w-100"
  })]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "fs-5 fs-w-400 display-grid"
  }, [_c("span", {
    staticClass: "skeleton skeleton-text w-100"
  })]);
}];
render._withStripped = true;


/***/ }),

/***/ "./resources/js/components/orders/orderDetail.vue":
/*!********************************************************!*\
  !*** ./resources/js/components/orders/orderDetail.vue ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _orderDetail_vue_vue_type_template_id_647a9420___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./orderDetail.vue?vue&type=template&id=647a9420& */ "./resources/js/components/orders/orderDetail.vue?vue&type=template&id=647a9420&");
/* harmony import */ var _orderDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./orderDetail.vue?vue&type=script&lang=js& */ "./resources/js/components/orders/orderDetail.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _orderDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _orderDetail_vue_vue_type_template_id_647a9420___WEBPACK_IMPORTED_MODULE_0__.render,
  _orderDetail_vue_vue_type_template_id_647a9420___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/orders/orderDetail.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/skeleton/skeletonOrderDetail.vue":
/*!******************************************************************!*\
  !*** ./resources/js/components/skeleton/skeletonOrderDetail.vue ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _skeletonOrderDetail_vue_vue_type_template_id_4ca0e3bb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./skeletonOrderDetail.vue?vue&type=template&id=4ca0e3bb& */ "./resources/js/components/skeleton/skeletonOrderDetail.vue?vue&type=template&id=4ca0e3bb&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");

var script = {}


/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  script,
  _skeletonOrderDetail_vue_vue_type_template_id_4ca0e3bb___WEBPACK_IMPORTED_MODULE_0__.render,
  _skeletonOrderDetail_vue_vue_type_template_id_4ca0e3bb___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/skeleton/skeletonOrderDetail.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/orders/orderDetail.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/orders/orderDetail.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_orderDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./orderDetail.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/orderDetail.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_orderDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/orders/orderDetail.vue?vue&type=template&id=647a9420&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/orders/orderDetail.vue?vue&type=template&id=647a9420& ***!
  \***************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_orderDetail_vue_vue_type_template_id_647a9420___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_orderDetail_vue_vue_type_template_id_647a9420___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_orderDetail_vue_vue_type_template_id_647a9420___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./orderDetail.vue?vue&type=template&id=647a9420& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/orders/orderDetail.vue?vue&type=template&id=647a9420&");


/***/ }),

/***/ "./resources/js/components/skeleton/skeletonOrderDetail.vue?vue&type=template&id=4ca0e3bb&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/components/skeleton/skeletonOrderDetail.vue?vue&type=template&id=4ca0e3bb& ***!
  \*************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_skeletonOrderDetail_vue_vue_type_template_id_4ca0e3bb___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_skeletonOrderDetail_vue_vue_type_template_id_4ca0e3bb___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_skeletonOrderDetail_vue_vue_type_template_id_4ca0e3bb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./skeletonOrderDetail.vue?vue&type=template&id=4ca0e3bb& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/skeleton/skeletonOrderDetail.vue?vue&type=template&id=4ca0e3bb&");


/***/ })

}]);