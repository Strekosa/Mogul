/* eslint-env browser */
/* globals MOGUL_DIST_PATH */

/** Dynamically set absolute public path from current protocol and host */
if (MOGUL_DIST_PATH) {
  __webpack_public_path__ = MOGUL_DIST_PATH; // eslint-disable-line no-undef, camelcase
}
