# Team Health Lead Generation

__Local:__ `th-lead-gen.test`

__Staging:__ `thleadgen.wpengine.com`

__Production:__ `TBD`

## Getting Started

1. `cd` to your WordPress root directory

2. Clone repo as `wp-content` (or whatever you have `WP_CONTENT_DIR` set to)

3. `cd` into `/themes/th-lead-gen/` run `yarn install` and `yarn build`

4. Change info in `gulp-config.json` as needed (probably just proxy)

5. Use `yarn watch` to do frontend magic

6. Activate Plugin: __WP Migrate DB Pro__ 

7. In the Dashboard, go to Tools > Migrate DB Pro and select pull and paste the following the textarea.

```
https://thleadgen.wpengine.com CSkcIlJ1RtzLg6f6s0eAqMp852YHzofRbfVreZI8
``` 

8. Select __Pull__ at the bottom