import { createInertiaApp } from '@inertiajs/react'; 
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'; 
// ... import lain bawaan starter kit dibiarkan seperti semula 

@source '../../Modules/Donasi/resources/js/pages/app.{ts,tsx}';

createInertiaApp({ 
    // ... title bawaan starter kit 
    resolve: (name) => { 
        const pages = import.meta.glob([ 
            './pages/**/*.tsx',
            '../../Modules/Donasi/resources/js/pages/app.tsx', 
        ]); 
        
        // Halaman modul ditulis dengan format NamaModul::nama-halaman 
        if (name.includes('::')) { 
            const [module, page] = name.split('::'); 
            
            return resolvePageComponent( 
                `../../Modules/${module}/resources/js/pages/${page}.tsx`, 
                pages,
            ); 
        }

        return resolvePageComponent(`./pages/${name}.tsx`, pages); 
    }, 
    // ... setup dan progress bawaan starter kit 
});