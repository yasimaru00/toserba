const { defineConfig } = require("cypress");

module.exports = defineConfig({
  projectId: 'dntyy4',
  component: {
    devServer: {
      framework: "vue",
      bundler: "webpack",
    },
  },

  component: {
    devServer: {
      framework: "vue",
      bundler: "webpack",
    },
  },

  e2e: {
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
