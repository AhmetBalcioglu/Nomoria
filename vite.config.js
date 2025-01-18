import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';
import { readdirSync, statSync } from 'fs';

function getAllFiles(dir, extension) {
    let results = [];
    const list = readdirSync(dir);
    list.forEach(file => {
        file = resolve(dir, file);
        const stat = statSync(file);
        if (stat && stat.isDirectory()) {
            results = results.concat(getAllFiles(file, extension));
        } else if (file.endsWith(extension)) {
            results.push(file);
        }
    });
    return results;
}

const scssFiles = getAllFiles('resources/css', '.scss');
const jsFiles = getAllFiles('resources/js', '.js');

export default defineConfig({
    plugins: [
        laravel({
            input: [
                ...scssFiles,
                ...jsFiles,
            ],
            refresh: true,
        }),
    ],
});
