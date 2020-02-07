$(function() {

    $('body').on('change', '#content-header', function () {

        var uri = $('#content-url');

        console.log(1);

        if (uri.val())
            return true;

        uri.val(translit($(this).val()));
        
        console.log(2);

    })

    $('body').on('change', '#product-header', function () {

        var uri = $('#product-url');

        console.log(1);

        if (uri.val())
            return true;

        uri.val(translit($(this).val()));
        
        console.log(2);

    })

})

function translit(text) {
    var space = '-';
    var result = '';
    var transl = {
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
        'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
        'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
        'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh', 'ъ': space,
        'ы': 'y', 'ь': space, 'э': 'e', 'ю': 'yu', 'я': 'ya'
    }
    text = text.toLowerCase();

    for (var i = 0; i < text.length; i++) {
        if (/[а-яё]/.test(text.charAt(i))) { // заменяем символы на русском
            result += transl[text.charAt(i)];
        } else if (/[a-z0-9]/.test(text.charAt(i))) { // символы на анг. оставляем как есть
            result += text.charAt(i);
        } else {
            if (result.slice(-1) !== space)
                result += space; // прочие символы заменяем на space
        }
    }

    return result;
}