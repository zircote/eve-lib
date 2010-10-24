:
##
 # @license Copyright 2010 Robert Allen
 # 
 # Licensed under the Apache License, Version 2.0 (the "License");
 # you may not use this file except in compliance with the License.
 # You may obtain a copy of the License at
 # 
 # http://www.apache.org/licenses/LICENSE-2.0
 # 
 # Unless required by applicable law or agreed to in writing, software
 # distributed under the License is distributed on an "AS IS" BASIS,
 # WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 # See the License for the specific language governing permissions and
 # limitations under the License.
 #

: ${PHPUNIT:="phpunit.php"}
: ${PHPUNIT_OPTS:="--verbose"}
: ${PHPUNIT_GROUPS:=}

while [ -n "$1" ] ; do
  case "$1" in 
    -h|--html)
      PHPUNIT_COVERAGE="--coverage-html $2" 
      shift 2 ;;

    -c|--clover)
      PHPUNIT_COVERAGE="--coverage-clover $2" 
      shift 2 ;;

    ALL|all|MAX|max)
     PHPUNIT_GROUPS="" 
     break ;;

    Account|Char|Corp|Eve|Map|Misc|Server)
     PHPUNIT_GROUPS="${PHPUNIT_GROUPS:+"$PHPUNIT_GROUPS,"}Zircote_Ccp_Api_Result_$1" 
     shift ;;

    Zircote#)
     PHPUNIT_GROUPS="${PHPUNIT_GROUPS:+"$PHPUNIT_GROUPS,"}$1" 
     shift ;;

    *)
     PHPUNIT_GROUPS="${PHPUNIT_GROUPS:+"$PHPUNIT_GROUPS,"}Zircote_$1" 
     shift ;;
  esac
done

set -x
${PHPUNIT} ${PHPUNIT_OPTS} ${PHPUNIT_COVERAGE} ${PHPUNIT_DB} \
  ${PHPUNIT_GROUPS:+--group $PHPUNIT_GROUPS}
