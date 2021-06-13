const path = require("path");
const webpack = require("webpack");
const MiniCssExtractWebpackPlugin = require("mini-css-extract-plugin");
const CopyWebpackPlugin = require("copy-webpack-plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");
const NonJsEntryCleanupPlugin = require("./non-js-entry-cleanup-plugin");
const FriendlyErrorsWebpackPlugin = require("friendly-errors-webpack-plugin");
const sass = require("node-sass");
const sassUtils = require("node-sass-utils")(sass);
const sassVars = require("../assets/variables");
// Convert js strings to dimenssions
const convertStringToSassDimension = function (result) {
  // Only attempt to convert strings
  if (typeof result !== "string") {
    return result;
  }

  const cssUnits = [
    "rem",
    "em",
    "vh",
    "vw",
    "vmin",
    "vmax",
    "ex",
    "%",
    "px",
    "cm",
    "mm",
    "in",
    "pt",
    "pc",
    "ch",
  ];
  const parts = result.match(/[a-zA-Z]+|[0-9]+/g);
  const value = parts[0];
  const unit = parts[parts.length - 1];
  if (cssUnits.indexOf(unit) !== -1) {
    result = new sassUtils.SassDimension(parseInt(value, 10), unit);
  }

  return result;
};
const {
  context,
  entry,
  devtool,
  outputFolder,
  publicFolder,
} = require("./config");
const HMR = require("./hmr");
const getPublicPath = require("./publicPath");

module.exports = (options) => {
  const { dev } = options;
  const hmr = HMR.getClient();
  return {
    mode: dev ? "development" : "production",
    devtool: dev ? devtool : false,
    context: path.resolve(context),
    entry: {
      "styles/main": dev ? [hmr, entry.styles] : entry.styles,
      "scripts/main": dev ? [hmr, entry.scripts] : entry.scripts,
    },
    output: {
      path: path.resolve(outputFolder),
      publicPath: getPublicPath(publicFolder),
      filename: "[name].js",
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /(node_modules|bower_components)/,
          use: [
            ...(dev ? [{ loader: "cache-loader" }] : []),
            { loader: "babel-loader" },
          ],
        },
        {
          test: /\.(sa|sc|c)ss$/,
          use: [
            ...(dev ? [{ loader: 'cache-loader' },
              { loader: 'style-loader', options: { sourceMap: dev } }] : [ MiniCssExtractWebpackPlugin.loader ]),
              { loader: 'css-loader', options: { sourceMap: dev } },
              { loader: 'postcss-loader', options: {
                  ident: 'postcss',
                  sourceMap: dev,
                  config: { ctx: { dev } }
                } },
              { loader: 'resolve-url-loader', options: { sourceMap: dev } },
              { loader: 'sass-loader', options: { sourceMap: true, sourceMapContents: dev } }
            ]
        },
        // {
        //   test: /\.(sa|sc|c)ss$/,
        //   use: [
        //     ...(dev
        //       ? [
        //           { loader: "cache-loader" },
        //           { loader: "style-loader", options: { sourceMap: dev } },
        //         ]
        //       : [MiniCssExtractWebpackPlugin.loader]),
        //     { loader: "css-loader", options: { sourceMap: dev } },
        //     {
        //       loader: "postcss-loader",
        //       options: {
        //         ident: "postcss",
        //         sourceMap: dev,
        //         config: { ctx: { dev } },
        //       },
        //     },
        //     { loader: "resolve-url-loader", options: { sourceMap: dev } },
        //     {
        //       loader: "sass-loader",
        //       options: {
        //         sourceMap: true,
        //         sourceMapContents: dev,
        //         sassOptions: {
        //           functions: {
        //             "get($keys)": function (keys) {
        //               keys = keys.getValue().split(".");
        //               var result = sassVars;
        //               var i;
        //               for (i = 0; i < keys.length; i++) {
        //                 result = result[keys[i]];
        //                 // Convert to SassDimension if dimenssion
        //                 if (typeof result === "string") {
        //                   result = convertStringToSassDimension(result);
        //                 } else if (typeof result === "object") {
        //                   Object.keys(result).forEach(function (key) {
        //                     var value = result[key];
        //                     result[key] = convertStringToSassDimension(value);
        //                   });
        //                 }
        //               }
        //               result = sassUtils.castToSass(result);
        //               return result;
        //             },
        //           },
        //         },
        //       },
        //     },
        //   ],
        // },
        {
          test: /\.(ttf|otf|eot|woff2?|png|jpe?g|gif|svg|ico|mp4|webm)$/,
          use: [
            {
              loader: "file-loader",
              options: {
                name: "[path][name].[ext]",
                esModule: false
              },
            },
          ],
        },
      ],
    },
    plugins: [
      ...(dev
        ? [
            new webpack.HotModuleReplacementPlugin(),
            new FriendlyErrorsWebpackPlugin(),
          ]
        : [
            new MiniCssExtractWebpackPlugin({
              filename: "[name].css",
            }),
            new NonJsEntryCleanupPlugin({
              context: "styles",
              extesion: "js",
              includeSubfolders: true,
            }),
            new CopyWebpackPlugin([path.resolve(outputFolder)], {
              allowExternal: true,
              beforeEmit: true,
            }),
            new CopyWebpackPlugin(
              [
                {
                  from: path.resolve(`${context}/**/*`),
                  to: path.resolve(outputFolder),
                },
              ],
              {
                ignore: ["*.js", "*.scss", "*.css"],
              }
            ),
          ]),
    ],

    /* All keys and values are below. */
  };
};
