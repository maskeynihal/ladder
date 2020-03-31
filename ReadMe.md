# LADDER

##### This is package for laravel for demo purpose and to learn about the package development

## What Does it do?

* Makes Hierarchy. 

| Title | Is_Root | Parent |
|-------|---------|--------|
|HOD    | Yes     | Null   |
|C. Dept| No      | HOD    |
|Devs.  | No      | C. Dept|
|F. Dept| No      | HOD    |
|Account  | No      | F. Dept|

├── HOD
│   ├──  C.Dept
│   │   ├── Devs.
│   │──  F. Dept
│   │   ├──  Account

### Setup

1. composer require maskeynihal/ladder
2. php artisan vendor:publish --tag=ladder-publish
3. php artisan ladder:seed (optional)