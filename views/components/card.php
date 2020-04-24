<?php include_once('views/components/labelMultiple.php') ?>

<script type="text/x-template" id="card">
<div class="card-col col" v-if="data && data.code === 1">
  <div class="card">
    <div class="card__img" style="background-image:url(https://vsem-edu-oblako.ru/upload/store/merchant1/small/1581752360-18094140.jpg)"></div>

    <div class="card__body">
      <div class="card__title"><b>{{data.details.data.item_name}}</b></div>

      <div class="card__desc">{{data.details.data.item_description}}</div>

      <div class="card__prices">
        <label class="card__radio-label" v-for="(price, index) in data.details.data.prices" :key="price.size" @click="changePrice(price.price)">
          <input class="card__check" type="radio" name="card-price-radio" :checked="index === 0">
          <span class="card__check-custom">
            <span class="card__check-text">{{price.size}}</span>
            <span class="card__check-text">{{price.formatted_price}}</span>
          </span>
        </label>
      </div>

      <div class="nutritional-value-card card__nutritional-value">
        <div class="card__section-title">Пищевая ценность в 100г продукта:</div>
        <div class="nutritional-value-card__body">
          <div class="nutritional-value-card__item">
            <div>Белки</div>
            <div>{{data.details.data.item_protein}} г</div>
          </div>
          <div class="nutritional-value-card__item">
            <div>Жиры</div>
            <div>{{data.details.data.item_fats}} г</div>
          </div>
          <div class="nutritional-value-card__item">
            <div>Углеводы</div>
            <div>{{data.details.data.item_carbohydrates}} г</div>
          </div>
          <div class="nutritional-value-card__item">
            <div>Каллорийность</div>
            <div>{{data.details.data.item_calories}} кКал</div>
          </div>
        </div>
      </div>

      <div class="card__addons">
        <div class="card__addon" v-for="addon in data.details.data.addon_item">
          <div class="card__section-title">{{addon.subcat_name}}</div>

          <div class="card__addon-body" v-if="addon.multi_option === 'one'">
            <label class="card__check-label" v-for="(item, index) in addon.sub_item" @click="changeSingleAddonPrice(item.price)">
              <input class="card__check" type="radio" :name="'card-addon-' + addon.subcat_id" :checked="index === 0">
              <span class="card__check-custom">
                <span class="card__check-text">{{item.sub_item_name}} + {{item.price}} Р</span>
              </span>
            </label>
          </div>

          <div class="card__addon-body" v-if="addon.multi_option === 'multiple'">
            <LabelMultiple
                    v-for="(item, index) in addon.sub_item"
                    :itemName="item.sub_item_name"
                    :price="item.price"
                    :addPrice="addPrice"
                    :removePrice="removePrice"
                    :key="item.sub_item_name"
            >
            </LabelMultiple>
          </div>
        </div>
      </div>
    </div>

    <a href="#" class="card__btn" @click.prevent>В корзину | {{commonPrice}} р</a>

  </div>
</div>

<div class="loading" v-else>Загрузка...</div>
</script>
