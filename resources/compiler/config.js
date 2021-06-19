module.exports = {
  context: "assets",
  entry: {
    styles: "./styles/main.scss",
    scripts: "./scripts/main.js",
  },
  devtool: "cheap-module-eval-source-map",
  devServer: {
    hot: true,
  },
  outputFolder: "../assets",
  publicFolder: "assets",
  proxyTarget: "http://localhost:8888/spvggbayreuth",
  watch: ["../../../**/*.php", "assets/scripts/*.js"],
};
