document.addEventListener('DOMContentLoaded', function () {

  //-----------------------------------------------------
  // CARD
  //-----------------------------------------------------
  Vue.component('LabelMultiple', {
    template: '#label-multiple',
    props: ['itemName', 'price', 'addPrice', 'removePrice'],
    data () {
      return {
        count: 0,
      };
    },
    methods: {
      add () {
        this.count++;
        this.addPrice(this.price);
      },
      remove () {
        if (this.count === 0) return;
        this.count--;
        this.removePrice(this.price);
      },
    },
  });

  Vue.component('Card', {
    template: '#card',
    data () {
      return {
        isLoading: true,
        data: null,
        price: 0,
        addonMultiplePrice: 0,
        addonSinglePrice: 0,
      };
    },
    computed: {
      commonPrice () {
        return +this.price + this.addonMultiplePrice + this.addonSinglePrice;
      },
    },
    methods: {
      getData () {
        var url = 'https://vsem-edu-oblako.ru/singlemerchant/api/loadItemDetails?merchant_keys=929990d3b27944af404a5eb3ee1ec4f6&device_id=89000001020&lang=ru&device_platform=mobile&json=true&item_id=18094140#get';
        fetch(url).then((response) => {
          return response.json();
        }).then((data) => {
          this.data = data;
          this.price = +data.details.data.prices[0].price;
          this.isLoading = false;
        });
      },

      addPrice (summ) {
        this.addonMultiplePrice += +summ;
      },

      removePrice (summ) {
        this.addonMultiplePrice -= +summ;
      },

      changePrice (price) {
        this.price = price;
      },

      changeSingleAddonPrice (price) {
        this.addonSinglePrice = +price;
      },
    },
    mounted () {
      this.getData();
    },
  });

  //-----------------------------------------------------
  // COMMENTS
  //-----------------------------------------------------
  Vue.component('Success', {
    template: '#success',
  });

  Vue.component('Form', {
    template: '#form',
    props: ['setComments', 'success'],
    data () {
      return {
        name: '',
        email: '',
        text: '',
      };
    },
    methods: {
      async sendForm () {

        if (!this.name && !this.email && !this.text) return;

        var url = '/comments/add';

        var response = await fetch(url, {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: `name=${this.name}&email=${this.email}&text=${this.text}`,
        });

        let result = await response.json();

        this.name = '';
        this.email = '';
        this.text = '';

        this.setComments(result);
        this.success();
      },
    },
  });

  Vue.component('Comment', {
    template: '#comment',
    props: ['id', 'name', 'email', 'text'],
  });

  Vue.component('Comments', {
    template: '#comments',
    data () {
      return {
        isLoading: false,
        comments: null,
        successTimer: null,
        isSuccess: false,
      };
    },
    methods: {
      getComments () {
        this.isLoading = true;
        var url = '/comments/all';
        fetch(url).then((response) => {
          return response.json();
        }).then((data) => {
          this.comments = data;
          this.isLoading = false;
        });
      },

      setComments (data) {
        this.comments = data;
      },

      success () {
        this.isSuccess = true;
        setTimeout(() => {
          this.isSuccess = false;
        }, 3000);
      },
    },
    mounted () {
      this.getComments();
    },
  });

  //-----------------------------------------------------
  // Создание экземпляра VUE
  //-----------------------------------------------------
  new Vue({
    el: '#app',
  });

});
