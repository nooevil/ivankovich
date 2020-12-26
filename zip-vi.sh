#!/bin/bash
zip -r "backup/theme_$(date '+%Y.%m.%d_%H%M').zip" october/themes
zip -r "backup/plugins_$(date '+%Y.%m.%d_%H%M').zip" october/plugins