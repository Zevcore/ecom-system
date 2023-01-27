<template>
  <div
    id="home"
    class="d-flex align-items-center justify-content-center flex-column mt-4"
  >
    <img alt="Vue logo" src="logo.jpg" id="logoImage" class="mb-3" />
    <h2>
      Witaj w <b>{{ $appName }}</b>
    </h2>

    <p>Zapraszamy do zakupu w naszym sklepie! 🙂</p>

    <div class="container-fluid mt-3">
      <p>Projekt utworzony przez:</p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item" v-for="creator in creators" :key="creator">
          {{ creator.name }}
          <span
            class="badge"
            :class="[`bg-${creator.bgColor}`, `text-${creator.color}`]"
          >
            {{ creator.role }}
          </span>
        </li>
      </ul>

      <p class="mt-3 text-center">
        Na zaliczenie przedmiotu <br />
        <b>Projekt&nbsp;Systemu&nbsp;Informatycznego</b>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",

  data() {
    return {
      creators: [
        {
          name: "Piotr Jarema",
          role: "SCRUM Master",
          bgColor: "danger",
          color: "light",
        },
        {
          name: "Maciej Wójcik",
          role: "Project Manager",
          bgColor: "primary",
          color: "light",
        },
        {
          name: "Mikołaj Pięcek",
          role: "Developer",
          bgColor: "warning",
          color: "dark",
        },
        {
          name: "Dariusz Letkiewicz",
          role: "Graphic Designer",
          bgColor: "info",
          color: "dark",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
#logoImage {
  width: 40%;

  @media (min-width: 992px) {
    width: 20%;
  }
}
</style>
