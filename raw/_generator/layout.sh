#!/usr/bin/env bash
export DOCUMENT_ROOT_PATH=/home/syafiq/Documents/JetBrains/PhpStorm/repos/Syafiqq/laravel-5-0
export LAYOUT_NAME=root_dashboard_index
export LAYOUT_PATH=root/dashboard/index
export LAYOUT_TYPE=default

export LAYOUT_HTML=${LAYOUT_NAME}_${LAYOUT_TYPE}.blade.php
export LAYOUT_CSS=${LAYOUT_NAME}_${LAYOUT_TYPE}.css
export LAYOUT_JS=${LAYOUT_NAME}_${LAYOUT_TYPE}.js

cd ${DOCUMENT_ROOT_PATH}
if [ ! -d raw/resources/views/layout/${LAYOUT_PATH} ]; then
  mkdir -p raw/resources/views/layout/${LAYOUT_PATH}
fi
cd raw/resources/views/layout/${LAYOUT_PATH}
if [ -a ${LAYOUT_HTML} ]; then
    rm ${LAYOUT_HTML} || exit 1
fi
touch ${LAYOUT_HTML}

cd ${DOCUMENT_ROOT_PATH}
if [ ! -d raw/public/assets/css/layout/${LAYOUT_PATH} ]; then
  mkdir -p raw/public/assets/css/layout/${LAYOUT_PATH}
fi
cd raw/public/assets/css/layout/${LAYOUT_PATH}
if [ -a ${LAYOUT_CSS} ]; then
    rm ${LAYOUT_CSS} || exit 1
fi
touch ${LAYOUT_CSS}

cd ${DOCUMENT_ROOT_PATH}
if [ ! -d raw/public/assets/js/layout/${LAYOUT_PATH} ]; then
  mkdir -p raw/public/assets/js/layout/${LAYOUT_PATH}
fi
cd raw/public/assets/js/layout/${LAYOUT_PATH}
if [ -a ${LAYOUT_JS} ]; then
    rm ${LAYOUT_JS} || exit 1
fi
touch ${LAYOUT_JS}