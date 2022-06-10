export default {
  data() {
    return {
      breakpoint: 768,
    };
  },

  methods: {
    setIsMobile() {
      const isMobile = window.innerWidth < this.breakpoint;

      this.$store.commit("setIsMobile", isMobile);
    },
  },

  mounted() {
    this.setIsMobile();

    window.addEventListener("resize", this.setIsMobile, { passive: true });
  },
};
