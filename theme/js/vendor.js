! function(t, e, n) {
    function a(t) { return t }

    function r(t) { return decodeURIComponent(t.replace(o, " ")) }
    var o = /\+/g,
        s = t.cookie = function(n, o, i) {
            if (void 0 !== o) {
                if (i = t.extend({}, s.defaults, i), null === o && (i.expires = -1), "number" == typeof i.expires) {
                    var c = i.expires,
                        p = i.expires = new Date;
                    p.setDate(p.getDate() + c)
                }
                return o = s.json ? JSON.stringify(o) : String(o), e.cookie = [encodeURIComponent(n), "=", s.raw ? o : encodeURIComponent(o), i.expires ? "; expires=" + i.expires.toUTCString() : "", i.path ? "; path=" + i.path : "", i.domain ? "; domain=" + i.domain : "", i.secure ? "; secure" : ""].join("")
            }
            for (var u = s.raw ? a : r, g = e.cookie.split("; "), l = 0, m = g.length; l < m; l++) { var f = g[l].split("="); if (u(f.shift()) === n) { var h = u(f.join("=")); return s.json ? JSON.parse(h) : h } }
            return null
        };
    s.defaults = {}, t.removeCookie = function(e, n) { return null !== t.cookie(e) && (t.cookie(e, null, n), !0) }
}(jQuery, document), $("ul.tabs").each(function() {
    var t, e, n = $(this).find("a");
    (t = $(n.filter('[href="' + location.hash + '"]')[0] || n[0])).parent("li").addClass("active"), e = $(t.attr("href")), n.not(t).each(function() { $($(this).attr("href")).hide() }), $("a", this).click(function(n) { t.parent("li").removeClass("active"), e.hide(), t = $(this), e = $($(this).attr("href")), t.parent("li").addClass("active"), e.show(), n.preventDefault() })
}), window.Rainbow = function() {
    function t(t) {
        var e, n = t.getAttribute && t.getAttribute("data-language") || 0;
        if (!n)
            for (t = t.attributes, e = 0; e < t.length; ++e)
                if ("data-language" === t[e].nodeName) return t[e].nodeValue;
        return n
    }

    function e(e) {
        var n = t(e) || t(e.parentNode);
        if (!n) {
            var a = /\blang(?:uage)?-(\w+)/;
            (e = e.className.match(a) || e.parentNode.className.match(a)) && (n = e[1])
        }
        return n
    }

    function n(t, e) {
        for (var n in f[w])
            if (n = parseInt(n, 10), (t == n && e == f[w][n] ? 0 : t <= n && e >= f[w][n]) && (delete f[w][n], delete m[w][n]), t >= n && t < f[w][n] || e > n && e < f[w][n]) return !0;
        return !1
    }

    function a(t, e) { return '<span class="' + t.replace(/\./g, " ") + (g ? " " + g : "") + '">' + e + "</span>" }

    function r(t, e, i, p) {
        var u = t.exec(i);
        if (u) {
            ++v, !e.name && "string" == typeof e.matches[0] && (e.name = e.matches[0], delete e.matches[0]);
            var g = u[0],
                l = u.index,
                h = u[0].length + l,
                d = function() {
                    function n() { r(t, e, i, p) }
                    v % 100 > 0 ? n() : setTimeout(n, 0)
                };
            if (n(l, h)) d();
            else {
                var b = o(e.matches),
                    y = function(t, n, r) {
                        if (t >= n.length) r(g);
                        else {
                            var o = u[n[t]];
                            if (o) {
                                var i = e.matches[n[t]],
                                    p = i.language,
                                    l = i.name && i.matches ? i.matches : i,
                                    m = function(e, o, s) {
                                        var i;
                                        i = 0;
                                        var c;
                                        for (c = 1; c < n[t]; ++c) u[c] && (i += u[c].length);
                                        o = s ? a(s, o) : o, g = g.substr(0, i) + g.substr(i).replace(e, o), y(++t, n, r)
                                    };
                                p ? c(o, p, function(t) { m(o, t) }) : "string" == typeof i ? m(o, o, i) : s(o, l.length ? l : [l], function(t) { m(o, t, i.matches ? i.name : 0) })
                            } else y(++t, n, r)
                        }
                    };
                y(0, b, function(t) { e.name && (t = a(e.name, t)), m[w] || (m[w] = {}, f[w] = {}), m[w][l] = { replace: u[0], with: t }, f[w][l] = h, d() })
            }
        } else p()
    }

    function o(t) { var e, n = []; for (e in t) t.hasOwnProperty(e) && n.push(e); return n.sort(function(t, e) { return e - t }) }

    function s(t, e, n) {
        function a(e, o) { o < e.length ? r(e[o].pattern, e[o], t, function() { a(e, ++o) }) : i(t, function(t) { delete m[w], delete f[w], --w, n(t) }) }++w, a(e, 0)
    }

    function i(t, e) {
        function n(t, e, a, r) {
            if (a < e.length) {
                ++y;
                var o = e[a],
                    s = m[w][o],
                    t = t.substr(0, o) + t.substr(o).replace(s.replace, s.with),
                    o = function() { n(t, e, ++a, r) };
                0 < y % 250 ? o() : setTimeout(o, 0)
            } else r(t)
        }
        n(t, o(m[w]), 0, e)
    }

    function c(t, e, n) {
        var a = h[e] || [],
            r = h[b] || [],
            e = d[e] ? a : a.concat(r);
        s(t.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/&(?![\w\#]+;)/g, "&amp;"), e, n)
    }

    function p(t, n, a) {
        if (n < t.length) {
            var r = t[n],
                o = e(r);
            return -1 < (" " + r.className + " ").indexOf(" rainbow ") || !o ? p(t, ++n, a) : (o = o.toLowerCase(), r.className += r.className ? " rainbow" : "rainbow", c(r.innerHTML, o, function(e) { r.innerHTML = e, m = {}, f = {}, l && l(r, o), setTimeout(function() { p(t, ++n, a) }, 0) }))
        }
        a && a()
    }

    function u(t, e) {
        var n, a = (t = t && "function" == typeof t.getElementsByTagName ? t : document).getElementsByTagName("pre"),
            r = t.getElementsByTagName("code"),
            o = [];
        for (n = 0; n < r.length; ++n) o.push(r[n]);
        for (n = 0; n < a.length; ++n) a[n].getElementsByTagName("code").length || o.push(a[n]);
        p(o, 0, e)
    }
    var g, l, m = {},
        f = {},
        h = {},
        d = {},
        w = 0,
        b = 0,
        v = 0,
        y = 0;
    return { extend: function(t, e, n) { 1 == arguments.length && (e = t, t = b), d[t] = n, h[t] = e.concat(h[t] || []) }, b: function(t) { l = t }, a: function(t) { g = t }, color: function(t, e, n) { return "string" == typeof t ? c(t, e, n) : "function" == typeof t ? u(0, t) : void u(t, e) } }
}(), window.addEventListener ? window.addEventListener("load", Rainbow.color, !1) : window.attachEvent("onload", Rainbow.color), Rainbow.onHighlight = Rainbow.b, Rainbow.addClass = Rainbow.a, Rainbow.extend([{ matches: { 1: { name: "keyword.operator", pattern: /\=/g }, 2: { name: "string", matches: { name: "constant.character.escape", pattern: /\\('|"){1}/g } } }, pattern: /(\(|\s|\[|\=|:)(('|")([^\\\1]|\\.)*?(\3))/gm }, { name: "comment", pattern: /\/\*[\s\S]*?\*\/|(\/\/|\#)[\s\S]*?$/gm }, { name: "constant.numeric", pattern: /\b(\d+(\.\d+)?(e(\+|\-)?\d+)?(f|d)?|0x[\da-f]+)\b/gi }, { matches: { 1: "keyword" }, pattern: /\b(and|array|as|bool(ean)?|c(atch|har|lass|onst)|d(ef|elete|o(uble)?)|e(cho|lse(if)?|xit|xtends|xcept)|f(inally|loat|or(each)?|unction)|global|if|import|int(eger)?|long|new|object|or|pr(int|ivate|otected)|public|return|self|st(ring|ruct|atic)|switch|th(en|is|row)|try|(un)?signed|var|void|while)(?=\(|\b)/gi }, { name: "constant.language", pattern: /true|false|null/g }, { name: "keyword.operator", pattern: /\+|\!|\-|&(gt|lt|amp);|\||\*|\=/g }, { matches: { 1: "function.call" }, pattern: /(\w+?)(?=\()/g }, { matches: { 1: "storage.function", 2: "entity.name.function" }, pattern: /(function)\s(.*?)(?=\()/g }]), Rainbow.extend("javascript", [{ name: "selector", pattern: /(\s|^)\$(?=\.|\()/g }, { name: "support", pattern: /\b(window|document)\b/g }, { matches: { 1: "support.property" }, pattern: /\.(length|node(Name|Value))\b/g }, { matches: { 1: "support.function" }, pattern: /(setTimeout|setInterval)(?=\()/g }, { matches: { 1: "support.method" }, pattern: /\.(getAttribute|push|getElementById|getElementsByClassName|log|setTimeout|setInterval)(?=\()/g }, { matches: { 1: "support.tag.script", 2: [{ name: "string", pattern: /('|")(.*?)(\1)/g }, { name: "entity.tag.script", pattern: /(\w+)/g }], 3: "support.tag.script" }, pattern: /(&lt;\/?)(script.*?)(&gt;)/g }, { name: "string.regexp", matches: { 1: "string.regexp.open", 2: { name: "constant.regexp.escape", pattern: /\\(.){1}/g }, 3: "string.regexp.close", 4: "string.regexp.modifier" }, pattern: /(\/)(?!\*)(.+)(\/)([igm]{0,3})/g }, { matches: { 1: "storage", 3: "entity.function" }, pattern: /(var)?(\s|^)(.*)(?=\s?=\s?function\()/g }, { matches: { 1: "keyword", 2: "entity.function" }, pattern: /(new)\s+(.*)(?=\()/g }, { name: "entity.function", pattern: /(\w+)(?=:\s{0,}function)/g }]), Rainbow.extend("html", [{ name: "source.php.embedded", matches: { 2: { language: "php" } }, pattern: /&lt;\?=?(?!xml)(php)?([\s\S]*?)(\?&gt;)/gm }, { name: "source.css.embedded", matches: { 0: { language: "css" } }, pattern: /&lt;style(.*?)&gt;([\s\S]*?)&lt;\/style&gt;/gm }, { name: "source.js.embedded", matches: { 0: { language: "javascript" } }, pattern: /&lt;script(?! src)(.*?)&gt;([\s\S]*?)&lt;\/script&gt;/gm }, { name: "comment.html", pattern: /&lt;\!--[\S\s]*?--&gt;/g }, { matches: { 1: "support.tag.open", 2: "support.tag.close" }, pattern: /(&lt;)|(\/?\??&gt;)/g }, { name: "support.tag", matches: { 1: "support.tag", 2: "support.tag.special", 3: "support.tag-name" }, pattern: /(&lt;\??)(\/|\!?)(\w+)/g }, { matches: { 1: "support.attribute" }, pattern: /([a-z-]+)(?=\=)/gi }, { matches: { 1: "support.operator", 2: "string.quote", 3: "string.value", 4: "string.quote" }, pattern: /(=)('|")(.*?)(\2)/g }, { matches: { 1: "support.operator", 2: "support.value" }, pattern: /(=)([a-zA-Z\-0-9]*)\b/g }, { matches: { 1: "support.attribute" }, pattern: /\s(\w+)(?=\s|&gt;)(?![\s\S]*&lt;)/g }], !0);