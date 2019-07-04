#!/bin/sh
set -e
cd target/generated-sources/openapi
npm install
npm run build
npm publish
