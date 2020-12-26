// import ShopaholicCart from '../../../js/shopaholic-cart/shopaholic-cart';
// import CreateOrder from '../../../js/shopaholic-order/create-order';

export default new class cartManipulation {
  // constructor() {
  //   this.obPartialUpdate = {
  //     update: {
  //       'product/cart/cart-mini/cart-info/cart-info-button': '._shopaholic-cart-button-wrapper',
  //     },
  //   };
  //
  //   this.onAddHandler = 'shopaholicCartAdd';
  //   this.onRemoveHandler = 'shopaholicCartRemove';
  //   this.buyButtonSelector = '_shopaholic-add-to-cart';
  //
  //   this.initShopaholic();
  //   this.initOrderConstructor();
  // }
  //
  // initOrderConstructor() {
  //   /* Init makeOrder handler */
  //   this.CreateOrder = new CreateOrder();
  //
  //   const submit = document.querySelector('.cart__submit');
  //
  //   if (!submit) return;
  //
  //   document.addEventListener('bouncerFormValid', () => {
  //     this.CreateOrder.createOrderObject();
  //     this.CreateOrder.sendOrder();
  //   });
  // }
  //
  //
  // initShopaholic() {
  //   /* Init shopaholicCart */
  //   this.shopaholicCart = new ShopaholicCart(['data-price', 'data-old-price']);
  //   this.cartHelper = this.shopaholicCart.getCartHelper();
  //
  //   /* Init shippingType observer */
  //   this.SetShippingType = this.shopaholicCart.initShippingTypeHandler();
  //   this.SetShippingType.obRequestData.update = {
  //     'product/cart/cart-total-result': '._shopaholic-delivery-total-price',
  //   };
  //   this.SetShippingType.initHandlers();
  //
  //   this.AddToCart = this.shopaholicCart.initAddToCart();
  //   this.AddToCart.initClickHandler();
  //   this.AddToCart.obRequestData = this.obPartialUpdate;
  //
  //   this.RemoveFromCart = this.shopaholicCart.initRemoveFromCart();
  //   this.RemoveFromCart.obRequestData = this.obPartialUpdate;
  //
  //   this.updateCart = this.shopaholicCart.initUpdateCart();
  //   this.updateCart.obRequestData = this.obPartialUpdate;
  //   this.updateCart.changeQuantityHandlerInit();
  //
  //   /* Init changeQuantity handler */
  //   this.changeProductQuantity = this.shopaholicCart.initProductQuantityHandler();
  //   this.changeProductQuantity.init();
  // }
}();
