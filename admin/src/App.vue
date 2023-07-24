<script setup>
import HelloWorld from "./components/HelloWorld.vue";
</script>

<template>
  <h1>Currency Converter API Documentation</h1>
  <hr />
  <br />
  API endpoint :
  <pre><code>/api
</code></pre>
  <ht />
  <h3 id="-lire-le-statut-de-l-api">💱 Lire le statut de l&#39;API</h3>
  <pre><code>GET /<span class="hljs-keyword">status</span>
</code></pre>
  <ul>
    <li>
      <p>Reponse</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
  <span class="hljs-attr">"status"</span>: <span class="hljs-number">200</span>,
  <span class="hljs-attr">"message"</span>: <span class="hljs-string">"API Status : 🟢 OK"</span>
}
</code></pre>
        </li>
      </ul>
    </li>
  </ul>
  <hr />
  <h3 id="-lister-les-devises">💱 Lister les devises</h3>
  <pre><code><span class="hljs-attribute">GET</span> /currencies
</code></pre>
  <ul>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">200</span>,
    <span class="hljs-attr">"currencies"</span>: [
        {
            <span class="hljs-attr">"id"</span>: <span class="hljs-number">1</span>,
            <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Euro"</span>,
            <span class="hljs-attr">"code"</span>: <span class="hljs-string">"EUR"</span>
        },
        {
            <span class="hljs-attr">"id"</span>: <span class="hljs-number">2</span>,
            <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Dollar"</span>,
            <span class="hljs-attr">"code"</span>: <span class="hljs-string">"USD"</span>
        },
        {
            <span class="hljs-attr">"id"</span>: <span class="hljs-number">3</span>,
            <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Bitcoin"</span>,
            <span class="hljs-attr">"code"</span>: <span class="hljs-string">"BTC"</span>
        },
        {
            <span class="hljs-attr">"id"</span>: <span class="hljs-number">4</span>,
            <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Etherum"</span>,
            <span class="hljs-attr">"code"</span>: <span class="hljs-string">"ETH"</span>
        }
    ]
}
</code></pre>
        </li>
      </ul>
    </li>
    <li>
      <p>Erreurs possibles :</p>
      <ul>
        <li>
          <p>Pas de devises trouvées</p>
          <pre><code>{
  <span class="hljs-attr">"status"</span>: <span class="hljs-number">404</span>,
  <span class="hljs-attr">"message"</span>: <span class="hljs-string">"No currencies found"</span>,
}
</code></pre>
        </li>
      </ul>
    </li>
  </ul>
  <hr />
  <h3 id="-lire-une-devise">💱 Lire une devise</h3>
  <pre><code>GET /currencies/{<span class="hljs-built_in">id</span>}
</code></pre>
  <ul>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
  <span class="hljs-attr">"status"</span>: <span class="hljs-number">200</span>,
  <span class="hljs-attr">"currency"</span>: {
      <span class="hljs-attr">"id"</span>: <span class="hljs-number">6</span>,
      <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Etherum"</span>,
      <span class="hljs-attr">"code"</span>: <span class="hljs-string">"ETH"</span>
  }
}
</code></pre>
        </li>
      </ul>
    </li>
    <li>
      <p>Erreurs possibles :</p>
      <ul>
        <li>
          <p>Pas de devises trouvées</p>
          <pre><code>  {
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">404</span>,
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"No currencies found"</span>,
  }
</code></pre>
        </li>
      </ul>
    </li>
  </ul>
  <hr />
  <h3 id="-cr-er-une-devise">💱 Créer une devise</h3>
  <pre><code><span class="hljs-attribute">POST</span> /currencies
</code></pre>
  <ul>
    <li><strong>Exemple de requête (body) :</strong></li>
  </ul>
  <pre><code>{
  <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Etherum"</span>,
  <span class="hljs-attr">"code"</span>: <span class="hljs-string">"ETH"</span>
}
</code></pre>
  <ul>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
  <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Etherum"</span>,
  <span class="hljs-attr">"code"</span>: <span class="hljs-string">"ETH"</span>,
  <span class="hljs-attr">"id"</span>: <span class="hljs-number">4</span>
}
</code></pre>
        </li>
      </ul>
    </li>
    <li>
      <p>Erreurs possibles :</p>
      <ul>
        <li>
          <p>Devise déjà existante</p>
          <pre><code>  {
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">409</span>,
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"This currency already exists"</span>,
  }
</code></pre>
        </li>
        <li>
          <p>Erreur de validation des données</p>
          <pre><code>  {
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">422</span>,
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"Validation failed"</span>,
    <span class="hljs-attr">"errors"</span>: {}
  }
</code></pre>
        </li>
      </ul>
    </li>
  </ul>
  <hr />
  <h3 id="-mettre-jour-une-devise">💱 Mettre à jour une devise</h3>
  <pre><code>PUT /currencies/{<span class="hljs-built_in">id</span>}
</code></pre>
  <ul>
    <li><strong>Exemple de requête (body) :</strong></li>
  </ul>
  <pre><code>{
  <span class="hljs-attr">"code"</span>: <span class="hljs-string">"QWE"</span>
}
</code></pre>
  <ul>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
  <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Etherum"</span>,
  <span class="hljs-attr">"code"</span>: <span class="hljs-string">"QWE"</span>,
  <span class="hljs-attr">"id"</span>: <span class="hljs-number">4</span>
}
</code></pre>
        </li>
      </ul>
    </li>
    <li>
      <p>Erreurs possibles :</p>
      <ul>
        <li>
          <p>Devise déjà existante</p>
          <pre><code>  {
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">409</span>,
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"This currency already exists"</span>,
  }
</code></pre>
        </li>
        <li>
          <p>Devise non trouvée</p>
          <pre><code>  {
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">409</span>,
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"Currency not found"</span>,
  }
</code></pre>
        </li>
        <li>
          <p>Erreur de validation des données</p>
          <pre><code>  {
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">422</span>,
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"Validation failed"</span>,
    <span class="hljs-attr">"errors"</span>: <span class="hljs-number">4</span>
  }
</code></pre>
        </li>
      </ul>
    </li>
  </ul>
  <hr />
  <h3 id="-supprimer-une-devise">💱 Supprimer une devise</h3>
  <pre><code><span class="hljs-keyword">DELETE</span> <span class="hljs-regexp">/currencies/</span>{id}
</code></pre>
  <ul>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">200</span>,
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"Successfully deleted"</span>,
    <span class="hljs-attr">"entry deleted"</span>: {
        <span class="hljs-attr">"id"</span>: <span class="hljs-number">6</span>,
        <span class="hljs-attr">"name"</span>: <span class="hljs-string">"Etherum"</span>,
        <span class="hljs-attr">"code"</span>: <span class="hljs-string">"QWE"</span>
    }
}
</code></pre>
        </li>
      </ul>
    </li>
    <li>
      <p>Erreurs possibles :</p>
      <ul>
        <li>
          <p>Devise non trouvée</p>
          <pre><code>  {
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">409</span>,
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"Currency not found"</span>,
  }
</code></pre>
        </li>
      </ul>
    </li>
  </ul>
  <hr />
  <h3 id="-lister-les-paires">💱 Lister les paires</h3>
  <pre><code>GET /<span class="hljs-built_in">pairs</span>
</code></pre>
  <ul>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">200</span>,
    <span class="hljs-attr">"pairs"</span>: [
        {
            <span class="hljs-attr">"id"</span>: <span class="hljs-number">1</span>,
            <span class="hljs-attr">"from_currency_id"</span>: <span class="hljs-number">1</span>,
            <span class="hljs-attr">"to_currency_id"</span>: <span class="hljs-number">2</span>,
            <span class="hljs-attr">"conversion_rate"</span>: <span class="hljs-string">"1.4000"</span>,
            <span class="hljs-attr">"count"</span>: <span class="hljs-number">0</span>,
            <span class="hljs-attr">"created_at"</span>: <span class="hljs-string">"2023-07-23T19:17:41.000000Z"</span>,
            <span class="hljs-attr">"updated_at"</span>: <span class="hljs-string">"2023-07-23T19:17:41.000000Z"</span>
        },
        {
            <span class="hljs-attr">"id"</span>: <span class="hljs-number">2</span>,
            <span class="hljs-attr">"from_currency_id"</span>: <span class="hljs-number">1</span>,
            <span class="hljs-attr">"to_currency_id"</span>: <span class="hljs-number">3</span>,
            <span class="hljs-attr">"conversion_rate"</span>: <span class="hljs-string">"1.2000"</span>,
            <span class="hljs-attr">"count"</span>: <span class="hljs-number">0</span>,
            <span class="hljs-attr">"created_at"</span>: <span class="hljs-string">"2023-07-23T19:18:59.000000Z"</span>,
            <span class="hljs-attr">"updated_at"</span>: <span class="hljs-string">"2023-07-23T19:18:59.000000Z"</span>
        },
    ]
}
</code></pre>
        </li>
      </ul>
    </li>
    <li>
      <p>Erreurs possibles :</p>
      <ul>
        <li>
          <p>Pas de paires trouvées</p>
          <pre><code>{
  <span class="hljs-attr">"status"</span>: <span class="hljs-number">404</span>,
  <span class="hljs-attr">"message"</span>: <span class="hljs-string">"No pairs found"</span>,
}
</code></pre>
        </li>
      </ul>
    </li>
  </ul>
  <hr />
  <h3 id="-lire-une-paire">💱 Lire une paire</h3>
  <pre><code>GET <span class="hljs-regexp">/pairs/</span><span class="hljs-keyword">from</span><span class="hljs-regexp">/{firstCurrencyId}/</span>to<span class="hljs-regexp">/{secondCurrencyId}</span>
</code></pre>
  <ul>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">200</span>,
    <span class="hljs-attr">"pair"</span>: [
        {
            <span class="hljs-attr">"id"</span>: <span class="hljs-number">5</span>,
            <span class="hljs-attr">"from_currency_id"</span>: <span class="hljs-number">1</span>,
            <span class="hljs-attr">"to_currency_id"</span>: <span class="hljs-number">5</span>,
            <span class="hljs-attr">"conversion_rate"</span>: <span class="hljs-string">"2.7000"</span>,
            <span class="hljs-attr">"count"</span>: <span class="hljs-number">0</span>,
            <span class="hljs-attr">"created_at"</span>: <span class="hljs-string">"2023-07-23T20:40:53.000000Z"</span>,
            <span class="hljs-attr">"updated_at"</span>: <span class="hljs-string">"2023-07-23T20:40:53.000000Z"</span>
        }
    ]
}
</code></pre>
        </li>
      </ul>
    </li>
    <li>
      <p>Erreurs possibles :</p>
      <ul>
        <li>
          <p>Pas de paires trouvées</p>
          <pre><code>{
  <span class="hljs-attr">"status"</span>: <span class="hljs-number">404</span>,
  <span class="hljs-attr">"message"</span>: <span class="hljs-string">"No pairs found"</span>,
}
</code></pre>
        </li>
      </ul>
    </li>
  </ul>
  <hr />
  <h3 id="-lire-le-nombre-de-conversions-pour-une-paire">
    💱 Lire le nombre de conversions pour une paire
  </h3>
  <pre><code>GET <span class="hljs-regexp">/pairs/</span><span class="hljs-keyword">count</span><span class="hljs-regexp">/from/</span>{firstCurrencyId}<span class="hljs-regexp">/to/</span>{secondCurrencyId}
</code></pre>
  <ul>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">200</span>,
    <span class="hljs-attr">"data"</span>: {
        <span class="hljs-attr">"count"</span>: <span class="hljs-number">0</span>
    }
}
</code></pre>
        </li>
      </ul>
    </li>
    <li>
      <p>Erreurs possibles :</p>
      <ul>
        <li>Pas de paires trouvées</li>
      </ul>
      <pre><code>{
  <span class="hljs-attr">"status"</span>: <span class="hljs-number">404</span>,
  <span class="hljs-attr">"message"</span>: <span class="hljs-string">"No pairs found"</span>
}
</code></pre>
    </li>
  </ul>
  <hr />
  <h3 id="-effectuer-une-conversion">💱 Effectuer une conversion</h3>
  <pre><code>POST /convert/{amount}/from/{currencyFrom}/<span class="hljs-keyword">to</span>/{currencyTo}
</code></pre>
  <ul>
    <li>
      <p>Exemple de requête :</p>
      <pre><code><span class="hljs-regexp">/convert/</span><span class="hljs-number">100</span><span class="hljs-regexp">/from/</span>EUR<span class="hljs-regexp">/to/</span>USD
</code></pre>
    </li>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">200</span>,
    <span class="hljs-attr">"data"</span>: <span class="hljs-number">140</span>
}
</code></pre>
        </li>
      </ul>
    </li>
    <li><p>Erreurs possibles :</p></li>
  </ul>
  <hr />
  <h3 id="-cr-er-une-paire">💱 Créer une paire</h3>
  <pre><code>POST /<span class="hljs-built_in">pairs</span>
</code></pre>
  <ul>
    <li><strong>Exemple de requête (body) :</strong></li>
  </ul>
  <pre><code>{
  <span class="hljs-attr">"from_currency_id"</span>: <span class="hljs-number">1</span>,
  <span class="hljs-attr">"to_currency_id"</span>: <span class="hljs-number">3</span>,
  <span class="hljs-attr">"conversion_rate"</span>: <span class="hljs-number">1.4</span>
}
</code></pre>
  <ul>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
  <span class="hljs-attr">"from_currency_id"</span>: <span class="hljs-number">1</span>,
  <span class="hljs-attr">"to_currency_id"</span>: <span class="hljs-number">3</span>,
  <span class="hljs-attr">"conversion_rate"</span>: <span class="hljs-number">1.4</span>,
  <span class="hljs-attr">"updated_at"</span>: <span class="hljs-string">"2023-07-23T19:18:59.000000Z"</span>,
  <span class="hljs-attr">"created_at"</span>: <span class="hljs-string">"2023-07-23T19:18:59.000000Z"</span>,
  <span class="hljs-attr">"id"</span>: <span class="hljs-number">2</span>
}
</code></pre>
        </li>
      </ul>
    </li>
    <li>
      <p>Erreurs possibles</p>
      <ul>
        <li>
          Paire existante
          <pre><code>{
  <span class="hljs-attr">"status"</span>: <span class="hljs-number">409</span>,
  <span class="hljs-attr">"message"</span>: <span class="hljs-string">"This pair already exists"</span>
}
</code></pre>
        </li>
        <li>
          <p>Erreur de validation des données</p>
          <pre><code>  {
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">422</span>,
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"Validation failed"</span>,
    <span class="hljs-attr">"errors"</span>: {}
  }
</code></pre>
        </li>
      </ul>
    </li>
  </ul>
  <hr />
  <h3 id="-mettre-jour-une-paire">💱 Mettre à jour une paire</h3>
  <pre><code>PUT /pairs/{<span class="hljs-built_in">id</span>}
</code></pre>
  <ul>
    <li><strong>Exemple de requête (body) :</strong></li>
  </ul>
  <pre><code>{
  <span class="hljs-attr">"conversion_rate"</span>: <span class="hljs-string">"1.6000"</span>
}
</code></pre>
  <ul>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">200</span>,
    <span class="hljs-attr">"pair modified"</span>: {
        <span class="hljs-attr">"id"</span>: <span class="hljs-number">7</span>,
        <span class="hljs-attr">"from_currency_id"</span>: <span class="hljs-number">1</span>,
        <span class="hljs-attr">"to_currency_id"</span>: <span class="hljs-number">3</span>,
        <span class="hljs-attr">"conversion_rate"</span>: <span class="hljs-number">1.6000</span>,
        <span class="hljs-attr">"count"</span>: <span class="hljs-number">0</span>,
        <span class="hljs-attr">"created_at"</span>: <span class="hljs-string">"2023-07-24T16:12:08.000000Z"</span>,
        <span class="hljs-attr">"updated_at"</span>: <span class="hljs-string">"2023-07-24T16:12:47.000000Z"</span>
    }
}
</code></pre>
        </li>
      </ul>
    </li>
    <li>
      <p>Erreurs possibles</p>
      <ul>
        <li>
          <p>Paire non trouvée</p>
          <pre><code>{
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">404</span>,
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"Pair not found"</span>
}
</code></pre>
        </li>
      </ul>
    </li>
  </ul>
  <hr />
  <h3 id="-supprimer-une-paire">💱 Supprimer une paire</h3>
  <pre><code><span class="hljs-keyword">DELETE</span> <span class="hljs-regexp">/pairs/</span>{id}
</code></pre>
  <ul>
    <li>
      <p>Exemple de reponse :</p>
      <ul>
        <li><p>Status : 🟢 200 OK</p></li>
        <li>
          <p>Body:</p>
          <pre><code>{
  <span class="hljs-attr">"status"</span>: <span class="hljs-number">200</span>,
  <span class="hljs-attr">"message"</span>: <span class="hljs-string">"Successfully deleted"</span>,
  <span class="hljs-attr">"entry deleted"</span>: {
      <span class="hljs-attr">"id"</span>: <span class="hljs-number">7</span>,
      <span class="hljs-attr">"from_currency_id"</span>: <span class="hljs-number">1</span>,
      <span class="hljs-attr">"to_currency_id"</span>: <span class="hljs-number">3</span>,
      <span class="hljs-attr">"conversion_rate"</span>: <span class="hljs-string">"1.6000"</span>,
      <span class="hljs-attr">"count"</span>: <span class="hljs-number">0</span>,
      <span class="hljs-attr">"created_at"</span>: <span class="hljs-string">"2023-07-24T16:12:08.000000Z"</span>,
      <span class="hljs-attr">"updated_at"</span>: <span class="hljs-string">"2023-07-24T16:12:47.000000Z"</span>
  }
}
</code></pre>
        </li>
      </ul>
    </li>
    <li>
      <p>Erreurs possibles</p>
      <ul>
        <li>
          <p>Paire non trouvée</p>
          <pre><code>{
    <span class="hljs-attr">"status"</span>: <span class="hljs-number">404</span>,
    <span class="hljs-attr">"message"</span>: <span class="hljs-string">"Pair not found"</span>
}
</code></pre>
        </li>
      </ul>
    </li>
  </ul>
  <hr />
</template>

<style scoped>
.doc {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

pre {
  background: rgb(26, 26, 26);
  padding: 1rem;
  border-radius: 10px;
}
</style>
