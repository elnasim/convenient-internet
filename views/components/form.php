<script type="text/x-template" id="form">
<form class="form" @submit.prevent="sendForm()">
  <label class="form__label">
    <input type="text" class="form__input" v-model="name" placeholder="Имя" required>
  </label>

  <label class="form__label">
    <input type="text" class="form__input" v-model="email" placeholder="Email" required>
  </label>

  <label class="form__label">
    <textarea class="form__textarea form__input" v-model="text" placeholder="Сообщение" required></textarea>
  </label>

  <button class="form__btn">Добавить</button>
</form>
</script>
